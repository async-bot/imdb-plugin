<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class SearchResultTest extends TestCase
{
    private Type $type;
    private SearchResult $searchResult;

    public function testGetTitle(): void
    {
        $this->assertSame('Guardians of the Galaxy Vol. 2', $this->searchResult->getTitle());
    }

    public function testGetYear(): void
    {
        $this->assertSame(2017, $this->searchResult->getYear());
    }

    public function testGetImdbId(): void
    {
        $this->assertSame('tt3896198', $this->searchResult->getImdbId());
    }

    public function testGetType(): void
    {
        $this->assertSame($this->type, $this->searchResult->getType());
    }

    public function testGetPoster(): void
    {
        $this->assertSame('https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg', $this->searchResult->getPoster());
    }

    protected function setUp(): void
    {
        $title      = 'Guardians of the Galaxy Vol. 2';
        $year       = 2017;
        $imdbId     = 'tt3896198';
        $this->type = new Type('movie');
        $poster     = 'https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg';

        $this->searchResult = new SearchResult($title, $year, $imdbId, $this->type, $poster);
    }
}
