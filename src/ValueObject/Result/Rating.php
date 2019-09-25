<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

final class Rating
{
    private string $source;

    private string $value;

    public function __construct(string $source, string $value)
    {
        $this->source = $source;
        $this->value  = $value;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
