<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\ValueObject\Result;

final class Ratings
{
    private Rating $imdb;

    private Rating $rottenTomatoes;

    private Rating $metaCritic;

    public function __construct(Rating $imdb, Rating $rottenTomatoes, Rating $metaCritic)
    {
        $this->imdb           = $imdb;
        $this->rottenTomatoes = $rottenTomatoes;
        $this->metaCritic     = $metaCritic;
    }

    public function getImdb(): Rating
    {
        return $this->imdb;
    }

    public function getRottenTomatoes(): Rating
    {
        return $this->rottenTomatoes;
    }

    public function getMetaCritic(): Rating
    {
        return $this->metaCritic;
    }
}
