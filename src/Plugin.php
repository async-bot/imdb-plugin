<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb;

use Amp\Promise;
use AsyncBot\Core\Http\Client;
use AsyncBot\Plugin\Imdb\Retriever\SearchById;
use AsyncBot\Plugin\Imdb\Retriever\SearchByTitle;
use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Title;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResults;
use function Amp\call;

final class Plugin
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
     * @throws Exception\InvalidImdbId
     */
    public function getByImdbId(string $imdbId): Promise
    {
        return (new SearchById($this->httpClient, $this->apiKey))->retrieve($imdbId);
    }

    /**
     * @return Promise<Title>
     */
    public function searchByTitle(string $title): Promise
    {
        return call(function () use ($title) {
            /** @var SearchResults $searchResults */
            $searchResults = yield (new SearchByTitle($this->httpClient, $this->apiKey))->retrieve($title);

            return $this->getByImdbId($searchResults->getFirst()->getImdbId());
        });
    }
}
