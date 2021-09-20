<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Resources\ResourceGetter
 */
class ResourceGetterTest extends UnitTestCase
{
    /**
     * @covers ::__construct
     * @covers ::getOauth
     */
    public function testGetOauth()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $oauth = $resource_getter->getOauth();

        $this->assertInstanceOf(Resources\OAuthResource::class, $oauth);
    }

    /**
     * @covers ::getNotifications
     */
    public function testGetNotifications()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $oauth = $resource_getter->getNotifications();

        $this->assertInstanceOf(Resources\NotificationsResource::class, $oauth);
    }
}
