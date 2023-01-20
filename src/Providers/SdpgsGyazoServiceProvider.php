<?php

declare(strict_types=1);

namespace Sdpgs\GyazoLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Sdpgs\Gyazo\GyazoClient;
use Sdpgs\Gyazo\GyazoException;

class SdpgsGyazoServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(GyazoClient::class, static function (): GyazoClient {
            $gyazoAccessToken = config('gyazo.gyazo_access_token');

            if (empty($gyazoAccessToken) || !is_string($gyazoAccessToken)) {
                throw new GyazoException('Gyazo access token is incorrect.');
            }
            return GyazoClient::getInstance($gyazoAccessToken);
        });

        $this->app->alias(GyazoClient::class, 'gyazo');
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/gyazo.php' => config_path('gyazo.php'),
            'sdpgs-gyazo-config',
        ]);
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [GyazoClient::class];
    }
}
