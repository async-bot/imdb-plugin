<?php declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\Exception;

use AsyncBot\Plugin\Imdb\Exception\InvalidImdbId;
use PHPUnit\Framework\TestCase;

class InvalidImdbIdTest extends TestCase
{
    public function testConstructorFormatsMessageCorrectly(): void
    {
        $this->expectException(InvalidImdbId::class);
        $this->expectExceptionMessage('The provided IMDB "TEST" id is not valid');

        throw new InvalidImdbId('TEST');
    }
}
