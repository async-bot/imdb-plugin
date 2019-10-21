<?php
declare(strict_types=1);


namespace AsyncBot\Plugin\ImdbTest\Unit\ValueObject;

use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use PHPUnit\Framework\TestCase;

class ApiKeyTest extends TestCase
{
    public function testSetterAndGetter(): void
    {
        $key = "TestKey";
        $apiKeyObj = new ApiKey($key);
        $this->assertEquals($key, $apiKeyObj->getKey());
    }
}
