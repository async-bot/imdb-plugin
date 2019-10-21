<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Ratings;
use PHPUnit\Framework\TestCase;

class RatingsTest extends TestCase
{
    private Rating $ratingImdb;
    private Rating $ratingRt;
    private Rating $ratingMeta;
    private Ratings $ratings;

    public function testGetImdb(): void
    {
        $this->assertSame($this->ratingImdb, $this->ratings->getImdb());
    }

    public function testGetRottenTomatoes(): void
    {
        $this->assertSame($this->ratingRt, $this->ratings->getRottenTomatoes());
    }

    public function testGetMetaCritic(): void
    {
        $this->assertSame($this->ratingMeta, $this->ratings->getMetaCritic());
    }

    public function testNullConstructorParams(): void
    {
        $ratings = new Ratings(null, null, null);

        $this->assertEmpty($ratings->getImdb());
        $this->assertEmpty($ratings->getRottenTomatoes());
        $this->assertEmpty($ratings->getMetaCritic());
    }

    protected function setUp(): void
    {
        $this->ratingImdb = new Rating('Internet Movie Database', '7.6/10');
        $this->ratingRt   = new Rating('Rotten Tomatoes', '84%');
        $this->ratingMeta = new Rating('Metacritic', '67/100');

        $this->ratings = new Ratings($this->ratingImdb, $this->ratingRt, $this->ratingMeta);
    }
}
