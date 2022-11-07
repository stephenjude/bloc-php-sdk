<?php

namespace Stephenjude\BlocPhpSdk\Tests;

use Stephenjude\BlocPhpSdk\Bloc;

class BlocSdkTest extends TestCase
{
    /** @test */
    public function it_can_instantiate_an_object()
    {
        $sdk = new Bloc('api-token');

        $this->assertTrue(is_object($sdk));
    }

    /** @test */
    public function it_has_support_for_performance_records()
    {
        $sdk = new Bloc('api-token');

        $this->assertTrue(method_exists($sdk, 'performanceRecords'));
    }

    /** @test */
    public function it_can_convert_short_date_formats()
    {
        $sdk = new Bloc('api-token');

        $startDate = '2020-06-08';
        $endDate = '2020-06-09';

        $this->assertEquals($sdk->convertDateFormat($startDate), '20200608000000');
        $this->assertEquals($sdk->convertDateFormat($endDate), '20200609000000');
    }

    /** @test */
    public function it_can_convert_long_date_formats()
    {
        $sdk = new Bloc('api-token');

        $startDate = '2020-06-08 12:00:00';
        $endDate = '2020-06-09 12:00:00';

        $this->assertEquals($sdk->convertDateFormat($startDate), '20200608120000');
        $this->assertEquals($sdk->convertDateFormat($endDate), '20200609120000');
    }

    /** @test */
    public function it_can_convert_date_formats_to_a_custom_format()
    {
        $sdk = new Bloc('api-token');

        $date = '2020-06-09 12:00:00';

        $this->assertEquals($sdk->convertDateFormat($date, 'Y:m:d H:i'), '2020:06:09 12:00');
    }
}
