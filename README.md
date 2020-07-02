# Basic Laravel Searching

Provides searching, searching with ranges, and sorting

## Installation

You can install the package via composer:

```bash
composer require jianjye/laravel-basic-search
```

## Usage

#### fuzzySearch - Search partialy
``` php
\LaravelBasicSearch::fuzzySearch($request, $model, $fields, $ranges, $sorts);
```

#### fuzzySearch - Search exactly
``` php
\LaravelBasicSearch::search($request, $model, $fields, $ranges, $sorts);
```

#### Sorting Links
``` php
\LaravelBasicSearch::links($request, $sorts);
```

#### Sorting Icons
``` php
\LaravelBasicSearch::icons($request, $sorts);
```

### Testing

``` bash
php vendor/phpunit/phpunit/phpunit
```


### Security

If you discover any security related issues, please email jj@mlcloud.dev instead of using the issue tracker.

## Credits

- [See Jian Jye](https://github.com/jianjye)
- [Farhan Hadi](https://github.com/xitox97)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
