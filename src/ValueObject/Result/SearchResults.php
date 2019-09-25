<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

final class SearchResults
{
    /** @var array<SearchResult> */
    private array $searchResults = [];

    public function __construct(SearchResult ...$searchResults)
    {
        $this->searchResults = $searchResults;
    }

    public function getFirst(): SearchResult
    {
        return $this->searchResults[0];
    }
}
