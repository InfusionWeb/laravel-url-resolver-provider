# Laravel 5 URL Resolver Provider
[![Latest Stable Version](https://poser.pugx.org/infusionweb/laravel-url-resolver-provider/v/stable)](https://packagist.org/packages/infusionweb/laravel-url-resolver-provider) [![Total Downloads](https://poser.pugx.org/infusionweb/laravel-url-resolver-provider/downloads)](https://packagist.org/packages/infusionweb/laravel-url-resolver-provider) [![Latest Unstable Version](https://poser.pugx.org/infusionweb/laravel-url-resolver-provider/v/unstable)](https://packagist.org/packages/infusionweb/laravel-url-resolver-provider) [![License](https://poser.pugx.org/infusionweb/laravel-url-resolver-provider/license)](https://packagist.org/packages/infusionweb/laravel-url-resolver-provider)

## A simple wrapper for using URLResolver.php in Laravel

This package provides a Laravel 5 service provider and facade for [mdf/php-url-resolver](https://github.com/mdf092/URLResolver.php), which is a fork of [mattwright/URLResolver.php](https://github.com/mattwright/URLResolver.php), which seems to no longer be maintained.

[URLResolver.php](https://github.com/mdf092/URLResolver.php) is a PHP class that attempts to resolve URLs to a final, canonical link. On the web today, link shorteners, tracking codes and more can result in many different links that ultimately point to the same resource. By following HTTP redirects and parsing web pages for open graph and canonical URLs, URLResolver.php attempts to solve this issue.

When enabled and configured, all this package does is allow more convenient use of the URLResolver.php functionality, through a Laravel facade.

## Installation

### Step 1: Composer

Via Composer command line:

```bash
$ composer require infusionweb/laravel-url-resolver-provider
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "infusionweb/laravel-url-resolver-provider": "~0.1.0"
    }
}
```

### Step 2: Register the Service Provider

Add the service provider to your `config/app.php`:

```php
'providers' => [
    //
    InfusionWeb\Laravel\Providers\UrlResolver::class,
];
```

### Step 3: Enable the Facade

Add the facade to your `config/app.php`:

```php
'aliases' => [
    //
    'Resolver' => InfusionWeb\Laravel\Facades\UrlResolver::class,
];
```

## Usage

### Simple case

```php
<?php

use Resolver;

$url = 'http://bit.ly/1R6M0uY';

$resolved = Resolver::resolveURL($url)->getURL();
```

### With additional setup

```php
<?php

use Resolver;

// Change the default user agent.
Resolver::setUserAgent('Mozilla/5.0 (compatible; YourAppName/1.0; +http://www.example.com)');

// Set a temporary file for session cookie storage.
Resolver::setCookieJar('/tmp/url_resolver.cookies');

// Test result object for additional information.
$url = 'http://goo.gl/0GMP1';
$url_result = $resolver->resolveURL($url);
if ($url_result->didErrorOccur()) {
    print "Error resolving $url:\n  ".$url_result->getErrorMessageString();
}
else {
    print $url_result->getHTTPStatusCode().': '.$url_result->getURL();
}
```

For additional documentation, see the [URLResolver.php documentation](https://github.com/mdf092/URLResolver.php/blob/master/README.md).

## Credits

- [Russell Keppner](https://github.com/rkeppner)
- [All Contributors](https://github.com/InfusionWeb/laravel-url-resolver-provider/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
