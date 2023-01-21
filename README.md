# sdpgs-gyazo-laravel

[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
[![tests](https://github.com/tanakaphper/sdpgs-gyazo/actions/workflows/php.yml/badge.svg)](https://github.com/tanakaphper/sdpgs-gyazo/actions/workflows/php.yml)
[![MIT PHPStan](https://img.shields.io/badge/PHPStan-level%20MAX-cornflowerblue)](https://phpstan.org/)

## Introduction

see [sdpgs-gyazo](https://github.com/tanakaphper/sdpgs-gyazo)

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First you have to do is to composer require:

```bash
composer require sdpgs/gyazo-laravel
```

Next, publish the config file into your Laravel configs:

```bash
php artisan vendor:publish --tag=sdpgs-gyazo-config
```

And you can see created `config/gyazo.php` file in your Laravel project.

Then, you have to add Gyazo access token to .env file as below.

```env
GYAZO_ACCESS_TOKEN=sd...
```

If you don't get Gyazo access token yet, go [Gyazo API](https://gyazo.com/api) dashboard and generate yours.

Finally, you may get available to use `Gyazo` facade.

```php
use Sdpgs\GyazoLaravel\Facades\Gyazo;

$response = Gyazo::uploadImage(
    imageData: '{image binary as string}',
    fileName: 'some_file.png',
    options: []
);

dd($response);
```

## Official Documentation

Documentation for Gyazo API can be found on [Gyazo API](https://gyazo.com/api)
