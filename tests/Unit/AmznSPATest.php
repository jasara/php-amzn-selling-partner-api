<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;

class AmznSPATest extends UnitTestCase
{
    public function testInvalidResource()
    {
        $this->expectException(InvalidResourceException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->not_a_resource;
    }

    public function testUsingMarketplace()
    {
        $config = $this->setupMinimalConfig();
        $amzn = new AmznSPA($config);

        $new_marketplace_id = Str::random();
        $this->assertEquals($config->marketplace_id, $amzn->getMarketplaceId());
        $new_amzn = $amzn->usingMarketplace($new_marketplace_id);

        // Doesn't change original object
        $this->assertEquals($config->marketplace_id, $amzn->getMarketplaceId());

        $this->assertEquals($new_marketplace_id, $new_amzn->getMarketplaceId());
    }
}
