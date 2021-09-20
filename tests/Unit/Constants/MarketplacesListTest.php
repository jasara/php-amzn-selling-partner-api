<?php

namespace Jasara\AmznSPA\Tests\Unit\Constants;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Constants\MarketplacesList
 */
class MarketplacesListTest extends UnitTestCase
{
    /**
     * @covers ::all
     */
    public function testAll()
    {
        $marketplaces = MarketplacesList::all();
        $this->assertInstanceOf(Collection::class, $marketplaces);
        $this->assertGreaterThan(19, count($marketplaces));
    }

    /**
     * @covers ::allIdentifiers
     */
    public function testAllIdentifiers()
    {
        $identifiers = MarketplacesList::allIdentifiers();
        $this->assertGreaterThan(19, count($identifiers));
        foreach ($identifiers as $identifier) {
            $this->assertIsString($identifier);
        }
    }

    /**
     * @covers ::getMarketplaceById
     */
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