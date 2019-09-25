<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Exception;

final class InvalidResponse extends Exception
{
    public function __construct(string $uri)
    {
        parent::__construct(sprintf('Got invalid response from %s', $uri));
    }
}
