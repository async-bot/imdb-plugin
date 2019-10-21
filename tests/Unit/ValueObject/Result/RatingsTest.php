<?php
declare(strict_types=1);


namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Ratings;
use PHPUnit\Framework\TestCase;

class RatingsTest extends TestCase
{
    public function testConstructorAssignmentIsCorrect(): void
    {
        $ratingImdb = new Rating("Internet Movie Database", "7.6/10");
        $ratingRt = new Rating("Rotten Tomatoes", "84%");
        $ratingMeta = new Rating("Metacritic", "67/100");
        $ratings = new Ratings($ratingImdb, $ratingRt, $ratingMeta);

        $this->assertEquals($ratingImdb, $ratings->getImdb());
        $this->assertEquals($ratingRt, $ratings->getRottenTomatoes());
        $this->assertEquals($ratingMeta, $ratings->getMetaCritic());
    }

    public function testNullConstructorParams(): void
    {
        $ratings = new Ratings(null, null, null);

        $this->assertEmpty($ratings->getImdb());
        $this->assertEmpty($ratings->getRottenTomatoes());
        $this->assertEmpty($ratings->getMetaCritic());
    }
}
