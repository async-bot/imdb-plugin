<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Retriever;

use Amp\Promise;
use AsyncBot\Core\Http\Client;
use AsyncBot\Plugin\Imdb\Exception\InvalidImdbId;
use AsyncBot\Plugin\Imdb\Parser\SearchByIdResult;
use AsyncBot\Plugin\Imdb\Validation\JsonSchema\SearchByIdResponse;
use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Title;
use function Amp\call;

final class SearchById
{
    private Client $httpClient;

    private ApiKey $apiKey;

    public function __construct(Client $httpClient, ApiKey $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey     = $apiKey;
    }

    /**
     * @return Promise<Title>
     * @throws InvalidImdbId
     */
    public function retrieve(string $imdbId): Promise
    {
        if (preg_match('~^(?:tt)?(\d{7,8})$~', $imdbId, $matches) !== 1) {
            throw new InvalidImdbId($imdbId);
        }

        return call(function () use ($matches) {
            return (new SearchByIdResult())->parse(
                yield $this->httpClient->requestJson(
                    sprintf('http://www.omdbapi.com/?i=tt%s&apikey=%s', $matches[1], $this->apiKey->getKey()),
                    new SearchByIdResponse(),
                ),
            );
        });
    }
}
