<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Validation\JsonSchema;

use Opis\JsonSchema\Schema;
use Opis\JsonSchema\Validator;
use function ExceptionalJSON\decode;
use function ExceptionalJSON\encode;

final class FindByIdResult
{
    private string $schema;

    public function __construct()
    {
        $this->schema = encode([
            '$id'        => 'AsyncBot/Plugin/Imdb/find-by-id-result.json',
            '$schema'    => 'http://json-schema.org/draft-07/schema#',
            'title'      => 'IMDB find by id result',
            'type'       => 'object',
            'required'   => [
                'Title',
                'Year',
                'Rated',
                'Released',
                'Runtime',
                'Genre',
                'Director',
                'Writer',
                'Actors',
                'Plot',
                'Language',
                'Country',
                'Awards',
                'Poster',
                'Ratings',
                'Metascore',
                'imdbRating',
                'imdbVotes',
                'imdbID',
                'Type',
                'DVD',
                'BoxOffice',
                'Production',
                'Website',
                'Response',
            ],
            'properties' => [
                'Title' => [
                    'type' => 'string',
                ],
                'Year' => [
                    'type' => 'string',
                ],
                'Rated' => [
                    'type' => 'string',
                ],
                'Released' => [
                    'type' => 'string',
                ],
                'Runtime' => [
                    'type' => 'string',
                ],
                'Genre' => [
                    'type' => 'string',
                ],
                'Director' => [
                    'type' => 'string',
                ],
                'Writer' => [
                    'type' => 'string',
                ],
                'Actors' => [
                    'type' => 'string',
                ],
                'Plot' => [
                    'type' => 'string',
                ],
                'Language' => [
                    'type' => 'string',
                ],
                'Country' => [
                    'type' => 'string',
                ],
                'Awards' => [
                    'type' => 'string',
                ],
                'Poster' => [
                    'type' => 'string',
                ],
                'Ratings' => [
                    'type'  => 'array',
                    'items' => [
                        'type'       => 'object',
                        'properties' => [
                            'Source' => [
                                'type' => 'string',
                            ],
                            'Value' => [
                                'type' => 'string',
                            ],
                        ],
                        'required' => [
                            'Source',
                            'Value',
                        ],
                    ],
                ],
                'Metascore' => [
                    'type' => 'string',
                ],
                'imdbRating' => [
                    'type' => 'string',
                ],
                'imdbVotes' => [
                    'type' => 'string',
                ],
                'imdbID' => [
                    'type' => 'string',
                ],
                'Type' => [
                    'type' => 'string',
                ],
                'DVD' => [
                    'type' => 'string',
                ],
                'BoxOffice' => [
                    'type' => 'string',
                ],
                'Production' => [
                    'type' => 'string',
                ],
                'Website' => [
                    'type' => 'string',
                ],
                'Response' => [
                    'const' => 'True',
                ],
            ],
        ]);
    }

    public function validateJson(string $json): bool
    {
        $schema = Schema::fromJsonString($this->schema);

        return (new Validator())->dataValidation(decode($json), $schema)->isValid();
    }
}
