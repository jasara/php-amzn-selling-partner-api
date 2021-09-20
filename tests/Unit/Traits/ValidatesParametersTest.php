<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\OAuthResource;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Traits\ValidatesParameters
 */
class ValidatesParametersTest extends UnitTestCase
{
    public function testRequiredParametersInConfigException()
    {
        $this->expectException(InvalidParametersException::class);

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            lwa_client_id: null,
            lwa_client_secret: Str::random(),
        );

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getOauth();
    }

    public function testRequiredParametersInConfigPasses()
    {
        $config = $this->setupMinimalConfig();

        $resource_getter = new ResourceGetter($config);
        $oauth = $resource_getter->getOauth();

        $this->assertInstanceOf(OAuthResource::class, $oauth);
    }

    public function testRequiredParametersInDtoException()
    {
        $this->expectException(InvalidParametersException::class);

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random(),
            lwa_client_id: null,
            lwa_client_secret: Str::random(),
        );

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getOauth();
    }

    public function testRequiredParametersInDtoPasses()
    {
        $config = $this->setupMinimalConfig();

        $resource_getter = new ResourceGetter($config);
        $oauth = $resource_getter->getOauth();

        $this->assertInstanceOf(OAuthResource::class, $oauth);
    }

    public function testRequiredParametersInArrayException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testRequiredParametersInArrayPasses()
    {
        $this->expectException(AmznSPAException::class); // Testing it is not the invalid parameters exception

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testValidatesStringEnumException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->notifications->getSubscription(Str::random());
    }

    public function testValidatesStringEnumPasses()
    {
        $this->expectException(AmznSPAException::class); // Testing it is not the invalid parameters exception

        list($config) = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }
}
