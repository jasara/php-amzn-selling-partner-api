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

    public function testGetCatalogItems()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $catalog_items = $resource_getter->getCatalogItems();

        $this->assertInstanceOf(Resources\CatalogItemsResource::class, $catalog_items);
    }

    public function testGetFbaInventory()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $fba_inventory = $resource_getter->getFbaInventory();

        $this->assertInstanceOf(Resources\FbaInventoryResource::class, $fba_inventory);
    }

    public function testGetProductPricing()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $product_pricing = $resource_getter->getProductPricing();

        $this->assertInstanceOf(Resources\ProductPricingResource::class, $product_pricing);
    }

    public function testGetMerchantFulFillment()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $merchant_fulfillment = $resource_getter->getMerchantFulFillment();

        $this->assertInstanceOf(Resources\MerchantFulFillmentResource::class, $merchant_fulfillment);
    }
}
