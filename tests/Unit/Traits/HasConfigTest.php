<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DataTransferObjects\AuthTokensDTO;
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

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random() . '.com',
            lwa_refresh_token: Str::random(),
            aws_access_key: Str::random(),
            aws_secret_key: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
        );

        $amzn = new AmznSPA($config);

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
