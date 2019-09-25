<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Retriever;

use Amp\Promise;
use AsyncBot\Core\Http\Client;
use AsyncBot\Plugin\Imdb\Parser\SearchByTitleResult;
use AsyncBot\Plugin\Imdb\Validation\JsonSchema\SearchByTitleResponse;
use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Title;
use function Amp\call;

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
     * @return Promise<Title>
     */
    public function retrieve(string $title): Promise
    {
        return call(function () use ($title) {
            return (new SearchByTitleResult())->parse(
                yield $this->httpClient->requestJson(
                    sprintf('http://www.omdbapi.com/?s=%s&apikey=%s', urlencode($title), $this->apiKey->getKey()),
                    new SearchByTitleResponse(),
                ),
            );
        });
    }
}
