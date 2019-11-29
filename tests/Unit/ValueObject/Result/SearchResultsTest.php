<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResults;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class SearchResultsTest extends TestCase
{
    private SearchResult $firstSearchResult;
    private SearchResults $searchResults;

    protected function setUp(): void
    {
        $this->firstSearchResult = new SearchResult('Guardians of the Galaxy Vol. 2', 2017, 'tt3896198', new Type('movie'), null);
        $searchResult2           = new SearchResult('Game of Thrones', 2011, 'tt0944947', new Type('series'), null);
        $searchResult3           = new SearchResult('Falling', 2014, 'tt3775876', new Type('episode'), null);

        $this->searchResults = new SearchResults($this->firstSearchResult, $searchResult2, $searchResult3);
    }

    public function testGetFirst(): void
    {
        $this->assertSame($this->firstSearchResult, $this->searchResults->getFirst());
    }

    public function testEmptyResults(): void
    {
        $searchResults = new SearchResults();

        $this->assertEmpty($searchResults->getFirst());
    }
}
