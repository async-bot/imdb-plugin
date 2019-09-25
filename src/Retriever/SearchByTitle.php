<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Retriever;

use Amp\Http\Client\Client;
use Amp\Http\Client\HttpException;
use Amp\Http\Client\Request;
use Amp\Http\Client\Response;
use Amp\Promise;
use AsyncBot\Plugin\Imdb\Exception\InvalidImdbId;
use AsyncBot\Plugin\Imdb\Exception\InvalidResponse;
use AsyncBot\Plugin\Imdb\Exception\NetworkError;
use AsyncBot\Plugin\Imdb\Parser\OmdbJsonIdResult;
use AsyncBot\Plugin\Imdb\Parser\OmdbJsonSearchResult;
use AsyncBot\Plugin\Imdb\Validation\JsonSchema\FindByIdResult;
use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Result;
use function Amp\call;
use function ExceptionalJSON\decode;

final class SearchByTitle
{
    private Client $httpClient;

    private ApiKey $apiKey;

    public function __construct(Client $httpClient, ApiKey $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey     = $apiKey;
    }

    /**
     * @return Promise<Result>
     */
    public function retrieve(string $title): Promise
    {
        return call(function () use ($title) {
            $request = new Request(
                sprintf('http://www.omdbapi.com/?s=%s&apikey=%s', urlencode($title), $this->apiKey->getKey()),
            );

            try {
                /** @var Response $response */
                $response = yield $this->httpClient->request($request);
            } catch (HttpException $e) {
                throw new NetworkError($request, 0, $e);
            }

            if ($response->getStatus() !== 200) {
                throw new NetworkError($request, $response->getStatus());
            }

            $jsonData = yield $response->getBody()->buffer();

            if (!(new FindByIdResult())->validateJson($jsonData)) {
                throw new InvalidResponse((string) $request->getUri());
            }

            return (new OmdbJsonSearchResult())->parse($jsonData);
        });
    }
}
