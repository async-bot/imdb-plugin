<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject;

final class ApiKey
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
