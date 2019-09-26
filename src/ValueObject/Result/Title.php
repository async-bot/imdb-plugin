<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

final class Title
{
    private string $title;

    private int $year;

    private string $rated;

    private \DateTimeImmutable $released;

    private string $runTime;

    private string $genre;

    private ?string $director;

    private string $writers;

    private string $actors;

    private string $plot;

    private string $language;

    private string $country;

    private ?string $awards;

    private ?string $poster;

    private Ratings $ratings;

    private ?int $metaScore;

    private float $imdbRating;

    private int $imdbVotes;

    private string $imdbId;

    private Type $type;

    private ?\DateTimeImmutable $dvdRelease;

    private ?string $boxOffice;

    private ?string $producer;

    private ?string $website;

    public function __construct(
        string $title,
        int $year,
        string $rated,
        \DateTimeImmutable $released,
        string $runTime,
        string $genre,
        ?string $director,
        string $writers,
        string $actors,
        string $plot,
        string $language,
        string $country,
        ?string $awards,
        ?string $poster,
        Ratings $ratings,
        ?int $metaScore,
        float $imdbRating,
        int $imdbVotes,
        string $imdbId,
        Type $type,
        ?\DateTimeImmutable $dvdRelease,
        ?string $boxOffice,
        ?string $producer,
        ?string $website
    ) {
        $this->title      = $title;
        $this->year       = $year;
        $this->rated      = $rated;
        $this->released   = $released;
        $this->runTime    = $runTime;
        $this->genre      = $genre;
        $this->director   = $director;
        $this->writers    = $writers;
        $this->actors     = $actors;
        $this->plot       = $plot;
        $this->language   = $language;
        $this->country    = $country;
        $this->awards     = $awards;
        $this->poster     = $poster;
        $this->ratings    = $ratings;
        $this->metaScore  = $metaScore;
        $this->imdbRating = $imdbRating;
        $this->imdbVotes  = $imdbVotes;
        $this->imdbId     = $imdbId;
        $this->type       = $type;
        $this->dvdRelease = $dvdRelease;
        $this->boxOffice  = $boxOffice;
        $this->producer   = $producer;
        $this->website    = $website;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getRated(): string
    {
        return $this->rated;
    }

    public function getReleased(): \DateTimeImmutable
    {
        return $this->released;
    }

    public function getRunTime(): string
    {
        return $this->runTime;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function getWriters(): string
    {
        return $this->writers;
    }

    public function getActors(): string
    {
        return $this->actors;
    }

    public function getPlot(): string
    {
        return $this->plot;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getAwards(): ?string
    {
        return $this->awards;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function getRatings(): Ratings
    {
        return $this->ratings;
    }

    public function getMetaScore(): ?int
    {
        return $this->metaScore;
    }

    public function getImdbRating(): float
    {
        return $this->imdbRating;
    }

    public function getImdbVotes(): int
    {
        return $this->imdbVotes;
    }

    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getDvdRelease(): ?\DateTimeImmutable
    {
        return $this->dvdRelease;
    }

    public function getBoxOffice(): ?string
    {
        return $this->boxOffice;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }
}
