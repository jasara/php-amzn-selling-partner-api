<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\OAuthResource;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Traits\ValidatesParameters
 */
class ValidatesParametersTest extends UnitTestCase
{
    /**
     * @covers ::validateConfigParameters
     */
    public function testRequiredParametersInConfigException()
    {
        $this->expectException(InvalidParametersException::class);

        $config = $this->setupMinimalConfig();
        $config->lwa_client_id = null;

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getOauth();
    }

    /**
     * @covers ::validateConfigParameters
     */
    public function testRequiredParametersInConfigPasses()
    {
        $config = $this->setupMinimalConfig();

        $resource_getter = new ResourceGetter($config);
        $oauth = $resource_getter->getOauth();

        $this->assertInstanceOf(OAuthResource::class, $oauth);
    }

    /**
     * @covers ::validateArrayParameters
     */
    public function testRequiredParametersInArrayException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    /**
     * @covers ::validateArrayParameters
     */
    public function testRequiredParametersInArrayPasses()
    {
        $this->expectException(AmznSPAException::class); // Testing it is not the invalid parameters exception

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }
}
