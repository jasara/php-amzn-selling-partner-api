<?php

namespace Jasara\AmznSPA\Tests\Unit\Constants;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestWith;

#[CoversClass(Marketplace::class)]
class MarketplaceTest extends UnitTestCase
{
    #[TestWith(['NA'])]
    #[TestWith(['EU'])]
    #[TestWith(['FE'])]
    public function testGetters(string $region)
    {
        $marketplace = new Marketplace(
            identifier: $identifier = Str::random(),
            country_code: $country_code = Str::random(),
            seller_central_url: $seller_central_url = Str::random(),
            region: $region,
        );

        $base_url = match ($region) {
            'NA' => 'https://sellingpartnerapi-na.amazon.com',
            'EU' => 'https://sellingpartnerapi-eu.amazon.com',
            'FE' => 'https://sellingpartnerapi-fe.amazon.com',
            default => 'https://sellingpartnerapi-na.amazon.com',
        };

        $aws_region = match ($region) {
            'NA' => 'us-east-1',
            'EU' => 'eu-west-1',
            'FE' => 'us-west-2',
            default => 'us-east-1',
        };

        $this->assertEquals($identifier, $marketplace->getIdentifier());
        $this->assertEquals($country_code, $marketplace->getCountryCode());
        $this->assertEquals($region, $marketplace->getRegion());
        $this->assertEquals($seller_central_url, $marketplace->getSellerCentralUrl());
        $this->assertEquals($base_url, $marketplace->getBaseUrl());
        $this->assertEquals($aws_region, $marketplace->getAwsRegion());
    }
}
