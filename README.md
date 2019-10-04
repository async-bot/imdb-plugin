# IMDB Plugin

[![Latest Stable Version](https://poser.pugx.org/async-bot/imdb-plugin/v/stable)](https://packagist.org/packages/async-bot/imdb-plugin)
[![Build Status](https://travis-ci.org/async-bot/imdb-plugin.svg?branch=master)](https://travis-ci.org/async-bot/imdb-plugin)
[![Coverage Status](https://coveralls.io/repos/github/async-bot/imdb-plugin/badge.svg?branch=master)](https://coveralls.io/github/async-bot/imdb-plugin?branch=master)
[![License](https://poser.pugx.org/async-bot/imdb-plugin/license)](https://packagist.org/packages/async-bot/imdb-plugin)

## Usage

```php
<?php declare(strict_types=1);

use Amp\Http\Client\Client;
use AsyncBot\Plugin\Imdb\Plugin;
use AsyncBot\Plugin\Imdb\ValueObject\ApiKey;
use function Amp\Promise\wait;

require_once __DIR__ . '/vendor/autoload.php';

$httpClient = new \AsyncBot\Core\Http\Client(new Client());

// search title by imdb id
var_dump(wait((new Plugin($httpClient, new ApiKey('YOUR_API_KEY')))->getByImdbId('tt3896198')));

// search title by title
var_dump(wait((new Plugin($httpClient, new ApiKey('YOUR_API_KEY')))->searchByTitle('pulp fiction')));
```
