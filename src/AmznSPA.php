<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Traits\HasConfig;

/**
 * @property Resources\CatalogItems\CatalogItems20201201Resource $catalog_items
 * @property Resources\CatalogItems\CatalogItems20201201Resource $catalog_items20201201
 * @property Resources\CatalogItems\CatalogItems20220401Resource $catalog_items20220401
 * @property Resources\AplusContentResource $aplus_content
 * @property Resources\FbaInboundEligibilityResource $fba_inbound_eligibility
 * @property Resources\FbaInventoryResource $fba_inventory
 * @property Resources\FeedsResource $feeds
 * @property Resources\FinancesResource $finances
 * @property Resources\FinancesV0Resource $finances_v0
 * @property Resources\FulfillmentInbound\FulfillmentInboundV0Resource $fulfillment_inbound
 * @property Resources\FulfillmentInbound\FulfillmentInboundV0Resource $fulfillment_inboundv0
 * @property Resources\FulfillmentInbound\FulfillmentInbound20240320Resource $fulfillment_inbound20240320
 * @property Resources\FulfillmentOutboundResource $fulfillment_outbound
 * @property Resources\ListingsItemsResource $listings_items
 * @property Resources\ListingsRestrictionsResource $listings_restrictions
 * @property Resources\LwaResource $lwa
 * @property Resources\MerchantFulfillmentResource $merchant_fulfillment
 * @property Resources\MessagingResource $messaging
 * @property Resources\NotificationsResource $notifications
 * @property Resources\OrdersResource $orders
 * @property Resources\Orders20260101Resource $orders20260101
 * @property Resources\ProductFeesResource $product_fees
 * @property Resources\ProductPricingResource $product_pricing
 * @property Resources\ProductPricing20220501Resource $product_pricing_20220501
 * @property Resources\ProductTypeDefinitionsResource $product_type_definitions
 * @property Resources\ReportsResource $reports
 * @property Resources\SalesResource $sales
 * @property Resources\SellersResource $sellers
 * @property Resources\ServicesResource $services
 * @property Resources\ShipmentInvoicingResource $shipment_invoicing
 * @property Resources\ShippingResource $shipping
 * @property Resources\SolicitationsResource $solicitations
 * @property Resources\TokensResource $tokens
 * @property Resources\TransfersResource $transfers
 * @property Resources\UploadsResource $uploads
 * @property Resources\VendorDirectFulfillmentInventoryResource $vendor_direct_fulfillment_inventory
 * @property Resources\VendorDirectFulfillmentOrdersResource $vendor_direct_fulfillment_orders
 * @property Resources\VendorDirectFulfillmentOrders20211228Resource $vendor_direct_fulfillment_orders20211228
 * @property Resources\VendorDirectFulfillmentPaymentsResource $vendor_direct_fulfillment_payments
 * @property Resources\VendorDirectFulfillmentShippingResource $vendor_direct_fulfillment_shipping
 * @property Resources\VendorDirectFulfillmentShipping20211228Resource $vendor_direct_fulfillment_shipping20211228
 * @property Resources\VendorDirectFulfillmentTransactionsResource $vendor_direct_fulfillment_transactions
 * @property Resources\VendorDirectFulfillmentTransactions20211228Resource $vendor_direct_fulfillment_transactions20211228
 * @property Resources\VendorInvoicesResource $vendor_invoices
 * @property Resources\VendorOrdersResource $vendor_orders
 * @property Resources\VendorShipmentsResource $vendor_shipments
 * @property Resources\VendorTransactionStatusResource $vendor_transaction_status
 **/
class AmznSPA
{
    use HasConfig;

    public function __construct(AmznSPAConfig $config)
    {
        $this->setupConfig($config);
    }

    public function __get($name)
    {
        $function = 'get' . Str::of($name)->title()->remove('_');

        $resource_getter = new ResourceGetter($this->config);

        if (! method_exists($resource_getter, $function)) {
            throw new InvalidResourceException($name . ' is not a supported resource.');
        }

        return $resource_getter->{$function}();
    }

    public function usingMarketplace(string $marketplace_id): self
    {
        $config = clone $this->config;
        $config->setMarketplace($marketplace_id);

        return new self($config);
    }

    public function usingHttp(Factory $http): self
    {
        $config = clone $this->config;
        $config->setHttp($http);

        return new self($config);
    }
}
