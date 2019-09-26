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
            $result['Rated'],
            $this->transformToDateTime($result['Released']),
            $result['Runtime'],
            $result['Genre'],
            $result['Director'],
            $result['Writer'],
            $result['Actors'],
            $result['Plot'],
            $result['Language'],
            $result['Country'],
            $this->getValueWhenAvailable($result['Awards']),
            $this->getValueWhenAvailable($result['Poster']),
            $this->transformToRatings($result['Ratings']),
            (int) $result['Metascore'],
            (float) $result['imdbRating'],
            (int) $result['imdbVotes'],
            $result['imdbID'],
            Type::fromOmdbType($result['Type']),
            $this->transformToDateTime($result['DVD']),
            $this->getValueWhenAvailable($result['BoxOffice']),
            $result['Production'],
            $this->getValueWhenAvailable($result['Website']),
        );
    }

    private function transformToDateTime(string $date): \DateTimeImmutable
    {
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
            $parsedRatings['Internet Movie Database'],
            $parsedRatings['Rotten Tomatoes'],
            $parsedRatings['Metacritic'],
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
