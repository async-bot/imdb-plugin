<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

final class SearchResult
{
    private string $title;

    private int $year;

    private string $imdbId;

    private Type $type;

    private ?string $poster;

    public function __construct(string $title, int $year, string $imdbId, Type $type, ?string $poster)
    {
        $this->title  = $title;
        $this->year   = $year;
        $this->imdbId = $imdbId;
        $this->type   = $type;
        $this->poster = $poster;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }
}
