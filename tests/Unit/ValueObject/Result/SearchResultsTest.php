<?php
declare(strict_types=1);


namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResults;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class SearchResultsTest extends TestCase
{
    public function testSetterAndGetter(): void
    {
        $firstSearchResult = new SearchResult("Guardians of the Galaxy Vol. 2", 2017, "tt3896198", new Type("movie"), null);
        $searchResult2 = new SearchResult("Game of Thrones", 2011, "tt0944947", new Type("series"), null);
        $searchResult3 = new SearchResult("Falling", 2014, "tt3775876", new Type("episode"), null);

        $searchResults = new SearchResults($firstSearchResult, $searchResult2, $searchResult3);
        $this->assertEquals($firstSearchResult, $searchResults->getFirst());
    }
}
