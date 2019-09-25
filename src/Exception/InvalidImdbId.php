<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Exception;

final class InvalidImdbId extends Exception
{
    public function __construct(string $imdbId)
    {
        parent::__construct(sprintf('The provided IMDB "%s" id is not valid', $imdbId));
    }
}
