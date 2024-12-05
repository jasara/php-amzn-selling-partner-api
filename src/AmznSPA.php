<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Traits\HasConfig;

/**
 * @property Resources\AuthorizationResource $authorization
 * @property Resources\CatalogItems\CatalogItems20201201Resource $catalog_items
 * @property Resources\CatalogItems\CatalogItems20201201Resource $catalog_items20201201
 * @property Resources\CatalogItems\CatalogItems20220401Resource $catalog_items20220401
 * @property Resources\FbaInboundEligibilityResource $fba_inbound_eligibility
 * @property Resources\FbaInventoryResource $fba_inventory
 * @property Resources\FeedsResource $feeds
 * @property Resources\FulfillmentInbound\FulfillmentInboundV0Resource $fulfillment_inbound
 * @property Resources\FulfillmentInbound\FulfillmentInboundV0Resource $fulfillment_inboundv0
 * @property Resources\FulfillmentInbound\FulfillmentInbound20240320Resource $fulfillment_inbound20240320
 * @property Resources\FulfillmentOutboundResource $fulfillment_outbound
 * @property Resources\ListingsItemsResource $listings_items
 * @property Resources\LwaResource $lwa
 * @property Resources\MerchantFulfillmentResource $merchant_fulfillment
 * @property Resources\NotificationsResource $notifications
 * @property Resources\OrdersResource $orders
 * @property Resources\ProductFeesResource $product_fees
 * @property Resources\ProductPricingResource $product_pricing
 * @property Resources\ProductTypeDefinitionsResource $product_type_definitions
 * @property Resources\ReportsResource $reports
 * @property Resources\SellersResource $sellers
 * @property Resources\ShippingResource $shipping
 * @property Resources\TokensResource $tokens
 * @property Resources\UploadsResource $uploads
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
