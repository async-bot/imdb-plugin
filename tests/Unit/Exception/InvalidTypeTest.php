<?php declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\Exception;

use AsyncBot\Plugin\Imdb\Exception\InvalidType;
use PHPUnit\Framework\TestCase;

class InvalidTypeTest extends TestCase
{
    public function testConstructorFormatsMessageCorrectly(): void
    {
        $this->expectException(InvalidType::class);
        $this->expectExceptionMessage('"games" is not a valid type');

        throw new InvalidType('games');
    }
}
