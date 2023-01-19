<?php

declare(strict_types=1);

namespace Sdpgs\GyazoLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Sdpgs\Gyazo\GyazoClient;

/**
 * @mixin GyazoClient
 */
class Gyazo extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor(): string
    {
        return 'gyazo';
    }
}
