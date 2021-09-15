<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ResourceGetterTest extends UnitTestCase
{
    public function testGetOauth()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $oauth = $resource_getter->getOauth();

        $this->assertInstanceOf(Resources\OAuthResource::class, $oauth);
    }
}
