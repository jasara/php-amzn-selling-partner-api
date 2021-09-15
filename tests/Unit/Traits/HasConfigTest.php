<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Traits\HasConfig
 */
class HasConfigTest extends UnitTestCase
{
    /**
     * @covers ::setupConfig
     * @covers ::getAccessToken
     */
    public function testGetAccessTokenNotSetException()
    {
        $this->expectException(AmznSPAException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());

        $amzn->getAccessToken();
    }

    /**
     * @covers ::setupConfig
     * @covers ::getAccessToken
     */
    public function testGetAccessToken()
    {
        $token = Str::random();
        $config = $this->setupMinimalConfig();
        $config->lwa_access_token = $token;

        $amzn = new AmznSPA($config);

        $this->assertEquals($token, $amzn->getAccessToken());
    }

    /**
     * @covers ::getMarketplaceId
     */
    public function testGetMarketplaceId()
    {
        $amzn = new AmznSPA($config = $this->setupMinimalConfig());
        $this->assertEquals($config->marketplace_id, $amzn->getMarketplaceId());
    }
}
