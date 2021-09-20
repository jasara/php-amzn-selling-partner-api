<?php

namespace Jasara\AmznSPA\Unit\Constants;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class MarketplaceTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\Constants\Marketplace
     */
    public function testGetters()
    {
        $identifier = Str::random();
        $country_code = Str::random();
        $regions = ['NA', 'EU', 'FE'];
        $region = $regions[rand(0, 2)];

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

        $this->assertEquals($identifier, $marketplace->getIdentifier());
        $this->assertEquals($country_code, $marketplace->getCountryCode());
        $this->assertEquals($region, $marketplace->getRegion());
        $this->assertEquals($base_url, $marketplace->getBaseUrl());
    }
}
