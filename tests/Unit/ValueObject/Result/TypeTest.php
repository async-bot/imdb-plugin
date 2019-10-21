<?php
declare(strict_types=1);

namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject\Result;

use AsyncBot\Plugin\Imdb\Exception\InvalidType;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testSetterAndGetter(): void
    {
        $value = 'movie';
        $type  = new Type($value);
        $this->assertSame($value, $type->getValue());
    }

    public function testInvalidValue(): void
    {
        $this->expectException(InvalidType::class);
        $this->expectExceptionMessage('"invalid" is not a valid type');

        $value = 'invalid';
        $type  = new Type($value);
    }
}
