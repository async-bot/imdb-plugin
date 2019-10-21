<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Ratings;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Title;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class TitleTest extends TestCase
{
    private Title $title;
    private Type $type;
    private Ratings $ratings;
    Private \DateTimeImmutable $released;
    Private \DateTimeImmutable $dvdRelease;

    public function testGetTitle(): void
    {
        $this->assertSame('Guardians of the Galaxy Vol. 2', $this->title->getTitle());
    }

    public function testGetYear(): void
    {
        $this->assertSame(2017, $this->title->getYear());
    }

    public function testGetRated(): void
    {
        $this->assertSame('PG-13', $this->title->getRated());
    }

    public function testGetReleased(): void
    {
        $this->assertSame($this->released, $this->title->getReleased());
    }

    public function testGetRunTime(): void
    {
        $this->assertSame('136 min', $this->title->getRunTime());
    }

    public function testGetGenre(): void
    {
        $this->assertSame('Action, Adventure, Comedy, Sci-Fi', $this->title->getGenre());
    }

    public function testGetDirector(): void
    {
        $this->assertSame('James Gunn', $this->title->getDirector());
    }

    public function testGettWriters(): void
    {
        $this->assertSame('James Gunn, Dan Abnett...', $this->title->getWriters());
    }

    public function testGetActors(): void
    {
        $this->assertSame('Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel', $this->title->getActors());
    }

    public function testGetPlot(): void
    {
        $this->assertSame('The Guardians struggle to keep togeth...', $this->title->getPlot());
    }

    public function testGetLanguage(): void
    {
        $this->assertSame('English', $this->title->getLanguage());
    }

    public function testGetCountry(): void
    {
        $this->assertSame('USA', $this->title->getCountry());
    }

    public function testGetAwards(): void
    {
        $this->assertSame('Nominated for 1 Oscar. Another 12 wins & 42 nominations.', $this->title->getAwards());
    }

    public function testGetPoster(): void
    {
        $this->assertSame('https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg', $this->title->getPoster());
    }

    public function testGetRatings(): void
    {
        $this->assertSame($this->ratings, $this->title->getRatings());
    }

    public function testGetMetaScore(): void
    {
        $this->assertSame(67, $this->title->getMetaScore());
    }

    public function testGetImdbRating(): void
    {
        $this->assertSame(7.6, $this->title->getImdbRating());
    }

    public function testGetImdbVotes(): void
    {
        $this->assertSame(507090, $this->title->getImdbVotes());
    }

    public function testGetImdbId(): void
    {
        $this->assertSame('tt3896198', $this->title->getImdbId());
    }

    public function testGetType(): void
    {
        $this->assertSame($this->type, $this->title->getType());
    }

    public function testGetDvdRelease(): void
    {
        $this->assertSame($this->dvdRelease, $this->title->getDvdRelease());
    }

    public function testGetBoxOffice(): void
    {
        $this->assertSame('$389,804,217', $this->title->getBoxOffice());
    }

    public function testGetProducer(): void
    {
        $this->assertSame('Walt Disney Pictures', $this->title->getProducer());
    }

    public function testGetWebsite(): void
    {
        $this->assertSame('https://marvel.com/guardians', $this->title->getWebsite());
    }

    protected function setUp(): void
    {
        $ratingImdb = new Rating('Internet Movie Database', '7.6/10');
        $ratingRt   = new Rating('Rotten Tomatoes', '84%');
        $ratingMeta = new Rating('Metacritic', '67/100');

        $this->ratings    = new Ratings($ratingImdb, $ratingRt, $ratingMeta);
        $title            = 'Guardians of the Galaxy Vol. 2';
        $year             = 2017;
        $rated            = 'PG-13';
        $this->released   = \DateTimeImmutable::createFromFormat('d M Y', '05 May 2017');
        $runTime          = '136 min';
        $genre            = 'Action, Adventure, Comedy, Sci-Fi';
        $director         = 'James Gunn';
        $writers          = 'James Gunn, Dan Abnett...';
        $actors           = 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel';
        $plot             = 'The Guardians struggle to keep togeth...';
        $language         = 'English';
        $country          = 'USA';
        $awards           = 'Nominated for 1 Oscar. Another 12 wins & 42 nominations.';
        $poster           = 'https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg';
        $metaScore        = 67;
        $imdbRating       = 7.6;
        $imdbVotes        = 507090;
        $imdbId           = 'tt3896198';
        $this->type       = new Type('movie');
        $this->dvdRelease = \DateTimeImmutable::createFromFormat('d M Y', '22 Aug 2017');
        $boxOffice        = '$389,804,217';
        $producer         = 'Walt Disney Pictures';
        $website          = 'https://marvel.com/guardians';

        $this->title = new Title(
            $title,
            $year,
            $rated,
            $this->released,
            $runTime,
            $genre,
            $director,
            $writers,
            $actors,
            $plot,
            $language,
            $country,
            $awards,
            $poster,
            $this->ratings,
            $metaScore,
            $imdbRating,
            $imdbVotes,
            $imdbId,
            $this->type,
            $this->dvdRelease,
            $boxOffice,
            $producer,
            $website);
    }
}
