<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ValidatesParametersTest extends UnitTestCase
{
    public function testRequiredParametersInConfig()
    {
        $this->expectException(InvalidParametersException::class);

        $config = $this->setupMinimalConfig();
        $config->lwa_client_id = null;

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getOauth();
    }

    public function testRequiredParametersInArray()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'spapi_oauth_code' => Str::random(),
        ]);
    }
}
