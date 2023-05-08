<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\TestWith;

/**
 * @covers \Jasara\AmznSPA\Resources\ResourceGetter
 */
class ResourceGetterTest extends UnitTestCase
{
    #[TestWith(['getAuthorization', Resources\AuthorizationResource::class])]
    #[TestWith(['getCatalogItems', Resources\CatalogItems\CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20201201', Resources\CatalogItems\CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20220401', Resources\CatalogItems\CatalogItems20220401Resource::class])]
    #[TestWith(['getFbaInboundEligibility', Resources\FbaInboundEligibilityResource::class])]
    #[TestWith(['getFbaInventory', Resources\FbaInventoryResource::class])]
    #[TestWith(['getFeeds', Resources\FeedsResource::class])]
    #[TestWith(['getFulfillmentInbound', Resources\FulfillmentInboundResource::class])]
    #[TestWith(['getFulfillmentOutbound', Resources\FulfillmentOutboundResource::class])]
    #[TestWith(['getListingsItems', Resources\ListingsItemsResource::class])]
    #[TestWith(['getLwa', Resources\LwaResource::class])]
    #[TestWith(['getMerchantFulfillment', Resources\MerchantFulfillmentResource::class])]
    #[TestWith(['getNotifications', Resources\NotificationsResource::class])]
    #[TestWith(['getOrders', Resources\OrdersResource::class])]
    #[TestWith(['getProductFees', Resources\ProductFeesResource::class])]
    #[TestWith(['getProductPricing', Resources\ProductPricingResource::class])]
    #[TestWith(['getProductTypeDefinitions', Resources\ProductTypeDefinitionsResource::class])]
    #[TestWith(['getReports', Resources\ReportsResource::class])]
    #[TestWith(['getSellers', Resources\SellersResource::class])]
    #[TestWith(['getShipping', Resources\ShippingResource::class])]
    #[TestWith(['getTokens', Resources\TokensResource::class])]
    #[TestWith(['getUploads', Resources\UploadsResource::class])]
    public function testGetsResource(string $function, string $expected_resource): void
    {
        $resource_getter = new Resources\ResourceGetter($this->setupMinimalConfig());
        $resource = $resource_getter->$function();

        $this->assertInstanceOf($expected_resource, $resource);
    }
}
