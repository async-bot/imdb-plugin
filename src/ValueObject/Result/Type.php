<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

use AsyncBot\Plugin\Imdb\Exception\InvalidType;

final class Type
{
    public const MOVIE   = 'movie';
    public const SERIES  = 'series';
    public const EPISODE = 'episode';

    private string $type;

    public function __construct(string $type)
    {
        if (!in_array($type, ['movie', 'series', 'episode'])) {
            throw new InvalidType($type);
        }

        $this->type = $type;
    }

    public static function fromOmdbType(string $type): self
    {
        return new self($type);
    }

    public function getValue(): string
    {
        return $this->type;
    }
}
