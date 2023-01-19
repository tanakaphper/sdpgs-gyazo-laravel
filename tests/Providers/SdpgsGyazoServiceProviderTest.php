<?php

use Illuminate\Config\Repository;
use Sdpgs\Gyazo\GyazoClient;
use Sdpgs\Gyazo\GyazoException;
use Sdpgs\GyazoLaravel\Providers\SdpgsGyazoServiceProvider;

it('binds the client on the container', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([
        'gyazo' => [
            'gyazo_access_token' => 'test',
        ],
    ]));

    (new SdpgsGyazoServiceProvider($app))->register();

    expect($app->get(GyazoClient::class))->toBeInstanceOf(GyazoClient::class);
});

it('binds the client on the container as singleton', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([
        'gyazo' => [
            'gyazo_access_token' => 'test',
        ],
    ]));

    (new SdpgsGyazoServiceProvider($app))->register();

    $gyazoClient = $app->get(GyazoClient::class);

    expect($app->get(GyazoClient::class))->toBe($gyazoClient);
});

it('requires an access token', function () {
    $app = app();

    $app->bind('config', fn () => new Repository([]));

    (new SdpgsGyazoServiceProvider($app))->register();
})->throws(
    GyazoException::class,
    'Gyazo access token is incorrect.'
);

it('provides', function () {
    $app = app();

    $provides = (new SdpgsGyazoServiceProvider($app))->provides();

    expect($provides)->toBe([GyazoClient::class]);
});
