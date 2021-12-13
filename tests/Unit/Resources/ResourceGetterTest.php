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

    public function testGetFulfillmentOutbound()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $fulfillment_outbound = $resource_getter->getFulfillmentOutbound();

        $this->assertInstanceOf(Resources\FulfillmentOutboundResource::class, $fulfillment_outbound);
    }

    public function testGetMerchantFulfillment()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $merchant_fulfillment = $resource_getter->getMerchantFulfillment();

        $this->assertInstanceOf(Resources\MerchantFulfillmentResource::class, $merchant_fulfillment);
    }

    public function testGetShipping()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $shipping = $resource_getter->getShipping();

        $this->assertInstanceOf(Resources\ShippingResource::class, $shipping);
    }

    public function testGetOrders()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $orders = $resource_getter->getOrders();

        $this->assertInstanceOf(Resources\OrdersResource::class, $orders);
    }

    public function testGetTokens()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $tokens = $resource_getter->getTokens();

        $this->assertInstanceOf(Resources\TokensResource::class, $tokens);
    }

    public function testGetListingsItems()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $listings_items = $resource_getter->getListingsItems();

        $this->assertInstanceOf(Resources\ListingsItemsResource::class, $listings_items);
    }

    public function testGetSellers()
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $sellers = $resource_getter->getSellers();

        $this->assertInstanceOf(Resources\SellersResource::class, $sellers);
    }
}
