<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Parser;

use AsyncBot\Plugin\Imdb\ValueObject\Result\Rating;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Result;
use AsyncBot\Plugin\Imdb\ValueObject\Result\Type;
use function ExceptionalJSON\decode;

final class OmdbJsonIdResult
{
    public function parse(string $jsonResult)
    {
        $result = decode($jsonResult, true);

        return new Result(
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
            $result['Poster'],
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
     * @return array<Rating>
     */
    private function transformToRatings(array $ratings): array
    {
        $parsedRatings = [];

        foreach ($ratings as $rating) {
            $parsedRatings[$rating['Source']] = new Rating($rating['Source'], $rating['Value']);
        }

        return $parsedRatings;
    }

    private function getValueWhenAvailable(string $value): ?string
    {
        if ($value === 'N/A') {
            return null;
        }

        return $value;
    }
}
