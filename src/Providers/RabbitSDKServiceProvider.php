<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Mafin\Internal\ApiClient;
use Mafin\Internal\Interfaces\ApiClientInterface;
use Mafin\RabbitmqApi\RabbitMQSdk;
use Mafin\RabbitmqApi\RabbitMQSdkInterface;

class RabbitSDKServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes(
            [
                __DIR__ . '/../../config/rabbitmq-sdk.php' => config_path('rabbitmq-sdk.php')
            ],
            'rabbitmq-sdk'
        );

        $this->app->bind(ApiClientInterface::class, ApiClient::class);
        $this->app->bind(RabbitMQSdkInterface::class, RabbitMQSdk::class);
    }

    public function boot()
    {
        $this->app->when(ApiClient::class)
                  ->needs(Client::class)
                  ->give(
                      static fn() => new Client(
                          [
                              'base_uri' => sprintf(
                                  '%s://%s:%s',
                                  Config::get('rabbitmq-sdk.protocol'),
                                  Config::get('rabbitmq-sdk.host'),
                                  Config::get('rabbitmq-sdk.port')
                              ),
                              'auth' => [
                                  Config::get('rabbitmq-sdk.username'),
                                  Config::get('rabbitmq-sdk.password')
                              ],
                          ]
                      )
                  );
    }
}
