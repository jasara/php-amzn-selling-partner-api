<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources\AuthorizationResource;
use Jasara\AmznSPA\Resources\CatalogItems\CatalogItems20201201Resource;
use Jasara\AmznSPA\Resources\CatalogItems\CatalogItems20220401Resource;
use Jasara\AmznSPA\Resources\FbaInboundEligibilityResource;
use Jasara\AmznSPA\Resources\FbaInventoryResource;
use Jasara\AmznSPA\Resources\FeedsResource;
use Jasara\AmznSPA\Resources\FulfillmentInbound\FulfillmentInbound20240320Resource;
use Jasara\AmznSPA\Resources\FulfillmentInbound\FulfillmentInboundV0Resource;
use Jasara\AmznSPA\Resources\FulfillmentOutboundResource;
use Jasara\AmznSPA\Resources\ListingsItemsResource;
use Jasara\AmznSPA\Resources\LwaResource;
use Jasara\AmznSPA\Resources\MerchantFulfillmentResource;
use Jasara\AmznSPA\Resources\NotificationsResource;
use Jasara\AmznSPA\Resources\OrdersResource;
use Jasara\AmznSPA\Resources\ProductFeesResource;
use Jasara\AmznSPA\Resources\ProductPricingResource;
use Jasara\AmznSPA\Resources\ProductTypeDefinitionsResource;
use Jasara\AmznSPA\Resources\ReportsResource;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Resources\SellersResource;
use Jasara\AmznSPA\Resources\ShippingResource;
use Jasara\AmznSPA\Resources\TokensResource;
use Jasara\AmznSPA\Resources\UploadsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestWith;

#[CoversClass(ResourceGetter::class)]
class ResourceGetterTest extends UnitTestCase
{
    #[TestWith(['getAuthorization', AuthorizationResource::class])]
    #[TestWith(['getCatalogItems', CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20201201', CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20220401', CatalogItems20220401Resource::class])]
    #[TestWith(['getFbaInboundEligibility', FbaInboundEligibilityResource::class])]
    #[TestWith(['getFbaInventory', FbaInventoryResource::class])]
    #[TestWith(['getFeeds', FeedsResource::class])]
    #[TestWith(['getFulfillmentInbound', FulfillmentInboundV0Resource::class])]
    #[TestWith(['getFulfillmentInboundv0', FulfillmentInboundV0Resource::class])]
    #[TestWith(['getFulfillmentInbound20240320', FulfillmentInbound20240320Resource::class])]
    #[TestWith(['getFulfillmentOutbound', FulfillmentOutboundResource::class])]
    #[TestWith(['getListingsItems', ListingsItemsResource::class])]
    #[TestWith(['getLwa', LwaResource::class])]
    #[TestWith(['getMerchantFulfillment', MerchantFulfillmentResource::class])]
    #[TestWith(['getNotifications', NotificationsResource::class])]
    #[TestWith(['getOrders', OrdersResource::class])]
    #[TestWith(['getProductFees', ProductFeesResource::class])]
    #[TestWith(['getProductPricing', ProductPricingResource::class])]
    #[TestWith(['getProductTypeDefinitions', ProductTypeDefinitionsResource::class])]
    #[TestWith(['getReports', ReportsResource::class])]
    #[TestWith(['getSellers', SellersResource::class])]
    #[TestWith(['getShipping', ShippingResource::class])]
    #[TestWith(['getTokens', TokensResource::class])]
    #[TestWith(['getUploads', UploadsResource::class])]
    public function testGetsResource(string $function, string $expected_resource): void
    {
        $resource_getter = new ResourceGetter($this->setupMinimalConfig());
        $resource = $resource_getter->$function();

        $this->assertInstanceOf($expected_resource, $resource);
    }
}
