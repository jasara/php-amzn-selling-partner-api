<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\ResourceGetter
 */
class ResourceGetterTest extends UnitTestCase
{
    public function testGetLwa()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $auth = $resource_getter->getLwa();

        $this->assertInstanceOf(Resources\LwaResource::class, $auth);
    }

    public function testGetAuthorization()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $auth = $resource_getter->getAuthorization();

        $this->assertInstanceOf(Resources\AuthorizationResource::class, $auth);
    }

    public function testGetNotifications()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $notifications = $resource_getter->getNotifications();

        $this->assertInstanceOf(Resources\NotificationsResource::class, $notifications);
    }

    public function testGetFulfillmentInbound()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $notifications = $resource_getter->getFulfillmentInbound();

        $this->assertInstanceOf(Resources\FulfillmentInboundResource::class, $notifications);
    }

    public function testGetFeeds()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $feeds = $resource_getter->getFeeds();

        $this->assertInstanceOf(Resources\FeedsResource::class, $feeds);
    }

    public function testGetReports()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $feeds = $resource_getter->getReports();

        $this->assertInstanceOf(Resources\ReportsResource::class, $feeds);
    }
}
