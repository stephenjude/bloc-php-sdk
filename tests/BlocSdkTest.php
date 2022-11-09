<?php

namespace Stephenjude\BlocHqPhpSdk\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Mockery;
use Stephenjude\BlocHqPhpSdk\BlocHQ;

class BlocSdkTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    /** @test */
    public function it_can_instantiate_an_object()
    {
        $sdk = new BlocHQ('api-token');

        $this->assertTrue(is_object($sdk));
    }

    /** @test */
    public function it_can_make_basic_requests()
    {
        $blocHQ = new BlocHQ('api-token');

        $blocHQ->setClient($http = Mockery::mock(Client::class));

        $http->expects('request')
            ->with('GET', 'banks', [])
            ->andReturns(
                new Response(
                    status: 200,
                    headers: [],
                    body: '{"success": true,"data": [{"name": "Banc Corp","code": "099"}]}'
                )
            );

        $this->assertCount(1, $blocHQ->getBankList());
    }
}
