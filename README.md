# Basic Laravel Searching

Provides searching, searching with ranges, and sorting

## Installation

You can install the package via composer:
```bash
composer require jianjye/laravel-basic-search
```

## Usage

#### `search` - Search with exact match
``` php
\LaravelBasicSearch::search($request, $model, $fields, $ranges, $sorts);
```

#### `fuzzySearch` - Search with partial match `%LIKE%`
``` php
\LaravelBasicSearch::fuzzySearch($request, $model, $fields, $ranges, $sorts);
```

#### Searching with custom date
``` php
$dates = ['date_field' => 'd-m-Y'];

\LaravelBasicSearch::search($request, $model, $fields, $ranges, $sorts, $dates);
```

#### Sorting Links (to be used in Blade)
``` php
\LaravelBasicSearch::links($request, $sorts);
```

#### Sorting Icons (to be used in Blade)
``` php
\LaravelBasicSearch::icons($request, $sorts);
```

### Testing

``` bash
php vendor/phpunit/phpunit/phpunit
```

## Credits

- [See Jian Jye](https://github.com/jianjye)
- [Farhan Hadi](https://github.com/xitox97)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
