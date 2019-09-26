<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Parser;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Ratings;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Title;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;

final class SearchByIdResult
{
    public function parse(array $result): Title
    {
        return new Title(
            $result['Title'],
            (int) $result['Year'],
            $this->getValueWhenAvailable($result['Rated']),
            $this->transformToDateTime($result['Released']),
            $result['Runtime'],
            $result['Genre'],
            $this->getValueWhenAvailable($result['Director']),
            $this->getValueWhenAvailable($result['Writer']),
            $this->getValueWhenAvailable($result['Actors']),
            $result['Plot'],
            $result['Language'],
            $result['Country'],
            $this->getValueWhenAvailable($result['Awards']),
            $this->getValueWhenAvailable($result['Poster']),
            $this->transformToRatings($result['Ratings']),
            $result['Metascore'] === 'N/A' ? null : (int) $result['Metascore'],
            (float) $result['imdbRating'],
            (int) $result['imdbVotes'],
            $result['imdbID'],
            Type::fromOmdbType($result['Type']),
            $this->transformToDateTime($result['DVD'] ?? null),
            $this->getValueWhenAvailable($result['BoxOffice'] ?? null),
            $result['Production'] ?? null,
            $this->getValueWhenAvailable($result['Website'] ?? null),
        );
    }

    private function transformToDateTime(?string $date): ?\DateTimeImmutable
    {
        if ($date === null || $date === 'N/A') {
            return null;
        }

        return \DateTimeImmutable::createFromFormat('d M Y', $date);
    }

    /**
     * @param $ratings array<string,string>
     */
    private function transformToRatings(array $ratings): Ratings
    {
        $parsedRatings = [];

        foreach ($ratings as $rating) {
            $parsedRatings[$rating['Source']] = new Rating($rating['Source'], $rating['Value']);
        }

        return new Ratings(
            $parsedRatings['Internet Movie Database'] ?? null,
            $parsedRatings['Rotten Tomatoes'] ?? null,
            $parsedRatings['Metacritic'] ?? null,
        );
    }

    private function getValueWhenAvailable(?string $value): ?string
    {
        if ($value === 'N/A') {
            return null;
        }

        return $value;
    }
}
