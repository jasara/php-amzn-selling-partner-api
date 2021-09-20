<?php

namespace Jasara\AmznSPA\Unit\Constants;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class MarketplaceTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\Constants\Marketplace
     * @dataProvider regions
     */
    public function testGetters(string $region)
    {
        $identifier = Str::random();
        $country_code = Str::random();

        $marketplace = new Marketplace(
            identifier: $identifier,
            country_code: $country_code,
            region: $region,
        );

        $base_url = match ($region) {
            'NA' => 'https://sellingpartnerapi-na.amazon.com',
            'EU' => 'https://sellingpartnerapi-eu.amazon.com',
            'FE' => 'https://sellingpartnerapi-fe.amazon.com',
        };

        $aws_region = match ($region) {
            'NA' => 'us-east-1',
            'EU' => 'eu-west-1',
            'FE' => 'us-west-2',
        };

        $this->assertEquals($identifier, $marketplace->getIdentifier());
        $this->assertEquals($country_code, $marketplace->getCountryCode());
        $this->assertEquals($region, $marketplace->getRegion());
        $this->assertEquals($base_url, $marketplace->getBaseUrl());
        $this->assertEquals($aws_region, $marketplace->getAwsRegion());
    }

    public function regions()
    {
        return [
            ['NA'],
            ['EU'],
            ['FE'],
        ];
    }
}
