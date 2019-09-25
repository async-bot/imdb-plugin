<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Exception;

final class InvalidType extends Exception
{
    public function __construct(string $type)
    {
        parent::__construct(sprintf('"%s" is not a valid type', $type));
    }
}
