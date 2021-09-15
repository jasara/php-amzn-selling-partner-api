<?php

namespace Jasara\AmznSPA\Tests\Unit\Constants;

use Jasara\AmznSPA\Constants\MarketplaceData;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class MarketplaceDataTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\Constants\MarketplaceData
     */
    public function testAllMarketplaces()
    {
        $marketplaces = MarketplaceData::allMarketplaces();
        $this->assertIsArray($marketplaces);
        $this->assertGreaterThan(19, count($marketplaces));
        foreach ($marketplaces as $marketplace_data) {
            $this->assertCount(3, $marketplace_data);
            $this->assertArrayHasKey('country_code', $marketplace_data);
            $this->assertArrayHasKey('region', $marketplace_data);
            $this->assertArrayHasKey('base_url', $marketplace_data);
        }
    }
}
