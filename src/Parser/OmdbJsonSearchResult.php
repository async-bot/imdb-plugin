<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Parser;

use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResult;
use AsyncBot\Plugin\Imdb\ValueObject\Result\SearchResults;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use function ExceptionalJSON\decode;

final class OmdbJsonSearchResult
{
    public function parse(string $jsonResult): SearchResults
    {
        $result = decode($jsonResult, true);

        $results = array_map(fn (array $item) => $this->parseSearchResultItem($item), $result['Search']);

        return new SearchResults(...$results);
    }

    private function parseSearchResultItem(array $item): SearchResult
    {
        return new SearchResult(
            $item['Title'],
            (int) $item['Year'],
            $item['imdbID'],
            Type::fromOmdbType($item['Type']),
            $this->getValueWhenAvailable($item['Poster']),
        );
    }

    private function getValueWhenAvailable(string $value): ?string
    {
        if ($value === 'N/A') {
            return null;
        }

        return $value;
    }
}
