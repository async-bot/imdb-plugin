<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Validation\JsonSchema;

use AsyncBot\Core\Http\Validation\JsonSchema;

final class SearchByIdResponse extends JsonSchema
{
    public function __construct()
    {
        parent::__construct(
            [
                '$id'        => 'AsyncBot/Plugin/Imdb/search-by-id-response.json',
                '$schema'    => 'http://json-schema.org/draft-07/schema#',
                'title'      => 'IMDB search by id response',
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
                        'enum' => [
                            'movie',
                            'series',
                            'episode',
                        ],
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
            ]
        );
    }
}
