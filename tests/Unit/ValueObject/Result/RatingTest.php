<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use PHPUnit\Framework\TestCase;

class RatingTest extends TestCase
{
    private Rating $rating;

    protected function setUp(): void
    {
        $source = 'Internet Movie Database';
        $value  = '7.6/10';

        $this->rating = new Rating($source, $value);
    }

    public function testGetSource(): void
    {
        $this->assertSame('Internet Movie Database', $this->rating->getSource());
    }

    public function testGetValue(): void
    {
        $this->assertSame('7.6/10', $this->rating->getValue());
    }
}
