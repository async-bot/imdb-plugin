<?php
declare(strict_types=1);


namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class SearchResultTest extends TestCase
{
    public function testConstructorAssignments(): void
    {
        $title = "Guardians of the Galaxy Vol. 2";
        $year = 2017;
        $imdbId = "tt3896198";
        $type = new Type("movie");
        $poster = "https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg";
        $searchresult = new SearchResult($title, $year, $imdbId, $type, $poster);

        $this->assertEquals($title, $searchresult->getTitle());
        $this->assertEquals($year, $searchresult->getYear());
        $this->assertEquals($imdbId, $searchresult->getImdbId());
        $this->assertEquals($type, $searchresult->getType());
        $this->assertEquals($poster, $searchresult->getPoster());
    }
}
