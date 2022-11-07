<?php

namespace Stephenjude\BlocPhpSdk;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Stephenjude\BlocPhpSdk\Actions\ManagesAccounts;
use Stephenjude\BlocPhpSdk\Actions\ManagesTransfers;

class Bloc
{
    use MakesHttpRequests;
    use ManagesAccounts;

    /** @var string */
    public string $apiToken;

    public Client $client;

    public function __construct(string $apiToken, string $baseUri = 'https://api.blochq.io/v1/')
    {
        $this->apiToken = $apiToken;

        $this->client = new Client([
            'base_uri' => $baseUri,
            'http_errors' => false,
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection);
    }

    public function convertDateFormat(string $date, $format = 'YmdHis'): string
    {
        return Carbon::parse($date)->format($format);
    }
}
