<?php

namespace Stephenjude\BlocHqPhpSdk\Tests;

use \PHPUnit\Framework\TestCase as BaseTestCase;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Stephenjude\BlocHqPhpSdk\BlocHQ;

abstract class TestCase extends BaseTestCase
{
    protected BlocHQ $bloc;

    public function setUp(): void
    {
        parent::setUp();

        $this->loadEnvironmentVariables();

        $apiToken = env('API_TOKEN');

        $client = new Client([
            'base_uri' => env('BLOC_HQ_API_URL', 'https://api.blochq.io.test/v1/'),
            'verify' => false,
            'http_errors' => false,
            'headers' => [
                'Authorization' => "Bearer {$apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        $this->bloc = new BlocHQ($apiToken);

        $this->bloc->setClient($client);
    }

    protected function loadEnvironmentVariables()
    {
        if (! file_exists(__DIR__ . '/../.env')) {
            return;
        }

        $dotEnv = Dotenv::createImmutable(__DIR__ . '/..');

        $dotEnv->load();
    }

    public function ensureApiTokenPresent()
    {
        if (! env('API_TOKEN')) {
            $this->markTestSkipped('No API token found');
        }
    }
}
