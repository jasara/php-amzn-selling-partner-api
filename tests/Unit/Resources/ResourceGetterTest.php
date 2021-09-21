<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\ResourceGetter
 */
class ResourceGetterTest extends UnitTestCase
{
    public function testGetAuth()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $auth = $resource_getter->getAuth();

        $this->assertInstanceOf(Resources\AuthResource::class, $auth);
    }

    public function testGetNotifications()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $notifications = $resource_getter->getNotifications();

        $this->assertInstanceOf(Resources\NotificationsResource::class, $notifications);
    }
}
