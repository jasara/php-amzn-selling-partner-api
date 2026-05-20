<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Jasara\AmznSPA\Resources\AplusContentResource;
use Jasara\AmznSPA\Resources\CatalogItems\CatalogItems20201201Resource;
use Jasara\AmznSPA\Resources\CatalogItems\CatalogItems20220401Resource;
use Jasara\AmznSPA\Resources\FbaInboundEligibilityResource;
use Jasara\AmznSPA\Resources\FbaInventoryResource;
use Jasara\AmznSPA\Resources\FeedsResource;
use Jasara\AmznSPA\Resources\FinancesResource;
use Jasara\AmznSPA\Resources\FinancesV0Resource;
use Jasara\AmznSPA\Resources\FulfillmentInbound\FulfillmentInbound20240320Resource;
use Jasara\AmznSPA\Resources\FulfillmentInbound\FulfillmentInboundV0Resource;
use Jasara\AmznSPA\Resources\FulfillmentOutboundResource;
use Jasara\AmznSPA\Resources\ListingsItemsResource;
use Jasara\AmznSPA\Resources\ListingsRestrictionsResource;
use Jasara\AmznSPA\Resources\LwaResource;
use Jasara\AmznSPA\Resources\MerchantFulfillmentResource;
use Jasara\AmznSPA\Resources\MessagingResource;
use Jasara\AmznSPA\Resources\NotificationsResource;
use Jasara\AmznSPA\Resources\Orders20260101Resource;
use Jasara\AmznSPA\Resources\OrdersResource;
use Jasara\AmznSPA\Resources\ProductFeesResource;
use Jasara\AmznSPA\Resources\ProductPricing20220501Resource;
use Jasara\AmznSPA\Resources\ProductPricingResource;
use Jasara\AmznSPA\Resources\ProductTypeDefinitionsResource;
use Jasara\AmznSPA\Resources\ReportsResource;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Resources\SalesResource;
use Jasara\AmznSPA\Resources\SellersResource;
use Jasara\AmznSPA\Resources\ServicesResource;
use Jasara\AmznSPA\Resources\ShipmentInvoicingResource;
use Jasara\AmznSPA\Resources\ShippingResource;
use Jasara\AmznSPA\Resources\SolicitationsResource;
use Jasara\AmznSPA\Resources\TokensResource;
use Jasara\AmznSPA\Resources\TransfersResource;
use Jasara\AmznSPA\Resources\UploadsResource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentInventoryResource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentOrders20211228Resource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentOrdersResource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentPaymentsResource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentShipping20211228Resource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentShippingResource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentTransactions20211228Resource;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentTransactionsResource;
use Jasara\AmznSPA\Resources\VendorInvoicesResource;
use Jasara\AmznSPA\Resources\VendorOrdersResource;
use Jasara\AmznSPA\Resources\VendorShipmentsResource;
use Jasara\AmznSPA\Resources\VendorTransactionStatusResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestWith;

#[CoversClass(ResourceGetter::class)]
class ResourceGetterTest extends UnitTestCase
{
    #[TestWith(['getCatalogItems', CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20201201', CatalogItems20201201Resource::class])]
    #[TestWith(['getCatalogItems20220401', CatalogItems20220401Resource::class])]
    #[TestWith(['getAplusContent', AplusContentResource::class])]
    #[TestWith(['getFbaInboundEligibility', FbaInboundEligibilityResource::class])]
    #[TestWith(['getFbaInventory', FbaInventoryResource::class])]
    #[TestWith(['getFeeds', FeedsResource::class])]
    #[TestWith(['getFinances', FinancesResource::class])]
    #[TestWith(['getFinancesV0', FinancesV0Resource::class])]
    #[TestWith(['getTransfers', TransfersResource::class])]
    #[TestWith(['getFulfillmentInbound', FulfillmentInboundV0Resource::class])]
    #[TestWith(['getFulfillmentInboundv0', FulfillmentInboundV0Resource::class])]
    #[TestWith(['getFulfillmentInbound20240320', FulfillmentInbound20240320Resource::class])]
    #[TestWith(['getFulfillmentOutbound', FulfillmentOutboundResource::class])]
    #[TestWith(['getListingsItems', ListingsItemsResource::class])]
    #[TestWith(['getListingsRestrictions', ListingsRestrictionsResource::class])]
    #[TestWith(['getLwa', LwaResource::class])]
    #[TestWith(['getMerchantFulfillment', MerchantFulfillmentResource::class])]
    #[TestWith(['getMessaging', MessagingResource::class])]
    #[TestWith(['getNotifications', NotificationsResource::class])]
    #[TestWith(['getOrders', OrdersResource::class])]
    #[TestWith(['getOrders20260101', Orders20260101Resource::class])]
    #[TestWith(['getProductFees', ProductFeesResource::class])]
    #[TestWith(['getProductPricing', ProductPricingResource::class])]
    #[TestWith(['getProductPricing20220501', ProductPricing20220501Resource::class])]
    #[TestWith(['getProductTypeDefinitions', ProductTypeDefinitionsResource::class])]
    #[TestWith(['getReports', ReportsResource::class])]
    #[TestWith(['getSales', SalesResource::class])]
    #[TestWith(['getSellers', SellersResource::class])]
    #[TestWith(['getServices', ServicesResource::class])]
    #[TestWith(['getShipmentInvoicing', ShipmentInvoicingResource::class])]
    #[TestWith(['getShipping', ShippingResource::class])]
    #[TestWith(['getSolicitations', SolicitationsResource::class])]
    #[TestWith(['getTokens', TokensResource::class])]
    #[TestWith(['getUploads', UploadsResource::class])]
    #[TestWith(['getVendorDirectFulfillmentInventory', VendorDirectFulfillmentInventoryResource::class])]
    #[TestWith(['getVendorDirectFulfillmentOrders', VendorDirectFulfillmentOrdersResource::class])]
    #[TestWith(['getVendorDirectFulfillmentOrders20211228', VendorDirectFulfillmentOrders20211228Resource::class])]
    #[TestWith(['getVendorDirectFulfillmentPayments', VendorDirectFulfillmentPaymentsResource::class])]
    #[TestWith(['getVendorDirectFulfillmentShipping', VendorDirectFulfillmentShippingResource::class])]
    #[TestWith(['getVendorDirectFulfillmentShipping20211228', VendorDirectFulfillmentShipping20211228Resource::class])]
    #[TestWith(['getVendorDirectFulfillmentTransactions', VendorDirectFulfillmentTransactionsResource::class])]
    #[TestWith(['getVendorDirectFulfillmentTransactions20211228', VendorDirectFulfillmentTransactions20211228Resource::class])]
    #[TestWith(['getVendorInvoices', VendorInvoicesResource::class])]
    #[TestWith(['getVendorOrders', VendorOrdersResource::class])]
    #[TestWith(['getVendorShipments', VendorShipmentsResource::class])]
    #[TestWith(['getVendorTransactionStatus', VendorTransactionStatusResource::class])]
    public function test_gets_resource(string $function, string $expected_resource): void
    {
        $resource_getter = new ResourceGetter($this->setupMinimalConfig());
        $resource = $resource_getter->$function();

        $this->assertInstanceOf($expected_resource, $resource);
    }
}
