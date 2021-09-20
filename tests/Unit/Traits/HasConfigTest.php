<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Traits\HasConfig
 */
class HasConfigTest extends UnitTestCase
{
    public function testGetAccessTokenNotSetException()
    {
        $this->expectException(AmznSPAException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());

        $amzn->getAccessToken();
    }

    public function testGetAccessToken()
    {
        $token = Str::random();
        $config = $this->setupMinimalConfig();
        $config->setTokens(new AuthTokensDTO(
            access_token: $token,
        ));

        $amzn = new AmznSPA($config);

        $this->assertEquals($token, $amzn->getAccessToken());
    }

    public function testGetMarketplaceId()
    {
        $amzn = new AmznSPA($config = $this->setupMinimalConfig());
        $this->assertEquals($config->getMarketplace()->getIdentifier(), $amzn->getMarketplaceId());
    }
}
