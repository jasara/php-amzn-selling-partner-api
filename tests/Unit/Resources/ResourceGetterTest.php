<?php

namespace Tests\Unit\Resources;

use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Tests\Unit\UnitTestCase;

class ResourceGetterTest extends UnitTestCase
{
    public function testOauthRequiredParameters()
    {
        $this->expectException(InvalidParametersException::class);

        $config = $this->setupMinimalConfig();
        $config->lwa_client_id = null;

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getOauth();
    }
}
