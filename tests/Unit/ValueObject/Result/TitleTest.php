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
    public function testSetterAndGetter(): void
    {
        $title = "Guardians of the Galaxy Vol. 2";
        $year = 2017;
        $rated = "PG-13";
        $released = \DateTimeImmutable::createFromFormat('d M Y', "05 May 2017");
        $runTime = "136 min";
        $genre = "Action, Adventure, Comedy, Sci-Fi";
        $director = "James Gunn";
        $writers = "James Gunn, Dan Abnett...";
        $actors = "Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel";
        $plot = "The Guardians struggle to keep togeth...";
        $language = "English";
        $country = "USA";
        $awards = "Nominated for 1 Oscar. Another 12 wins & 42 nominations.";
        $poster = "https://m.media-amazon.com/images/M/MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg";
        $ratingImdb = new Rating("Internet Movie Database", "7.6/10");
        $ratingRt = new Rating("Rotten Tomatoes", "84%");
        $ratingMeta = new Rating("Metacritic", "67/100");
        $ratings = new Ratings($ratingImdb, $ratingRt, $ratingMeta);
        $metaScore = 67;
        $imdbRating = 7.6;
        $imdbVotes = 507090;
        $imdbId = "tt3896198";
        $type = new Type("movie");
        $dvdRelease = \DateTimeImmutable::createFromFormat('d M Y', "22 Aug 2017");
        $boxOffice = "$389,804,217";
        $producer = "Walt Disney Pictures";
        $website = "https://marvel.com/guardians";
        $titleObj = new Title(
            $title,
            $year,
            $rated,
            $released,
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
            $ratings,
            $metaScore,
            $imdbRating,
            $imdbVotes,
            $imdbId,
            $type,
            $dvdRelease,
            $boxOffice,
            $producer,
            $website);

        $this->assertEquals($title, $titleObj->getTitle());
        $this->assertEquals($year, $titleObj->getYear());
        $this->assertEquals($rated, $titleObj->getRated());
        $this->assertEquals($released, $titleObj->getReleased());
        $this->assertEquals($runTime, $titleObj->getRunTime());
        $this->assertEquals($genre, $titleObj->getGenre());
        $this->assertEquals($director, $titleObj->getDirector());
        $this->assertEquals($writers, $titleObj->getWriters());
        $this->assertEquals($actors, $titleObj->getActors());
        $this->assertEquals($plot, $titleObj->getPlot());
        $this->assertEquals($language, $titleObj->getLanguage());
        $this->assertEquals($country, $titleObj->getCountry());
        $this->assertEquals($awards, $titleObj->getAwards());
        $this->assertEquals($poster, $titleObj->getPoster());
        $this->assertEquals($ratings, $titleObj->getRatings());
        $this->assertEquals($metaScore, $titleObj->getMetaScore());
        $this->assertEquals($imdbRating, $titleObj->getImdbRating());
        $this->assertEquals($imdbVotes, $titleObj->getImdbVotes());
        $this->assertEquals($imdbId, $titleObj->getImdbId());
        $this->assertEquals($type, $titleObj->getType());
        $this->assertEquals($dvdRelease, $titleObj->getDvdRelease());
        $this->assertEquals($boxOffice, $titleObj->getBoxOffice());
        $this->assertEquals($producer, $titleObj->getProducer());
        $this->assertEquals($website, $titleObj->getWebsite());
    }
}
