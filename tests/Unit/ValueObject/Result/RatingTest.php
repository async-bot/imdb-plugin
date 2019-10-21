<?php
declare(strict_types=1);


namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use PHPUnit\Framework\TestCase;

class RatingTest extends TestCase
{
    public function testConstructorAssignsCorrectValues(): void
    {
        $source = "Internet Movie Database";
        $value = "7.6/10";
        $rating = new Rating($source, $value);
        $this->assertEquals($source, $rating->getSource());
        $this->assertEquals($value, $rating->getValue());
    }
}
