<?php declare(strict_types=1);

namespace AsyncBot\Plugin\Imdb\Validation\JsonSchema;

use AsyncBot\Core\Http\Validation\JsonSchema;

final class SearchByTitleResponse extends JsonSchema
{
    public function __construct()
    {
        parent::__construct(
            [
                '$id'        => 'AsyncBot/Plugin/Imdb/search-by-title-response.json',
                '$schema'    => 'http://json-schema.org/draft-07/schema#',
                'title'      => 'IMDB search by title response',
                'type'       => 'object',
                'required'   => [
                    'Search',
                    'totalResults',
                    'Response',
                ],
                'properties' => [
                    'Search' => [
                        'type'  => 'array',
                        'items' => [
                            [
                                'type'  => 'object',
                                'required' => [
                                    'Title',
                                    'Year',
                                    'imdbID',
                                    'Type',
                                    'Poster',
                                ],
                                'properties' => [
                                    'Title' => [
                                        'type' => 'string',
                                    ],
                                    'Year' => [
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
                                    'Poster' => [
                                        'type' => 'string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'totalResults' => [
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
