<?php

namespace Jasara\AmznSPA\Tests\Unit\Constants;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Constants\MarketplacesList
 */
class MarketplacesListTest extends UnitTestCase
{
    public function testAll()
    {
        $marketplaces = MarketplacesList::all();
        $this->assertInstanceOf(Collection::class, $marketplaces);
        $this->assertGreaterThan(19, count($marketplaces));
    }

    public function testAllIdentifiers()
    {
        $identifiers = MarketplacesList::allIdentifiers();
        $this->assertGreaterThan(19, count($identifiers));
        foreach ($identifiers as $identifier) {
            $this->assertIsString($identifier);
        }
    }

    public function testAllCountryCodes()
    {
        $country_codes = MarketplacesList::allCountryCodes();
        $this->assertGreaterThan(19, count($country_codes));
        foreach ($country_codes as $country_code) {
            $this->assertIsString($country_code);
            $this->assertEquals(2, strlen($country_code));
        }
    }

    public function testGetMarketplaceFromIdentifier()
    {
        $identifier = 'A2EUQ1WTGCTBG2';
        $marketplace = MarketplacesList::getMarketplaceById($identifier);

        $this->assertInstanceOf(Marketplace::class, $marketplace);
        $this->assertEquals($identifier, $marketplace->getIdentifier());
        $this->assertEquals('CA', $marketplace->getCountryCode());
        $this->assertEquals('NA', $marketplace->getRegion());
        $this->assertEquals('https://sellingpartnerapi-na.amazon.com', $marketplace->getBaseUrl());
    }
}
