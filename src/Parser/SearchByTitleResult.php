<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Parser;

use AsyncBot\Plugin\Imdb\Exception\InvalidType;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResults;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;

final class SearchByTitleResult
{
    public function parse(array $result): SearchResults
    {
        $results = array_map(fn (array $item) => $this->parseSearchResultItem($item), $result['Search']);

        $results = array_filter($results);

        return new SearchResults(...$results);
    }

    private function parseSearchResultItem(array $item): ?SearchResult
    {
        try {
            return new SearchResult(
                $item['Title'],
                (int) $item['Year'],
                $item['imdbID'],
                Type::fromOmdbType($item['Type']),
                $this->getValueWhenAvailable($item['Poster']),
            );
        } catch (InvalidType $e) {
            // we are not interested in games
            return null;
        }
    }

    private function getValueWhenAvailable(string $value): ?string
    {
        if ($value === 'N/A') {
            return null;
        }

        return $value;
    }
}
