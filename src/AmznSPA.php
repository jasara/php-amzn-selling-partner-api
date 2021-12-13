<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Traits\HasConfig;

/**
 * @property \Jasara\AmznSPA\Resources\AuthorizationResource $authorization
 * @property \Jasara\AmznSPA\Resources\CatalogItemsResource $catalog_items
 * @property \Jasara\AmznSPA\Resources\FbaInboundEligibilityResource $fba_inbound_eligibility
 * @property \Jasara\AmznSPA\Resources\FbaInventoryResource $fba_inventory
 * @property \Jasara\AmznSPA\Resources\FeedsResource $feeds
 * @property \Jasara\AmznSPA\Resources\FulfillmentInboundResource $fulfillment_inbound
 * @property \Jasara\AmznSPA\Resources\LwaResource $lwa
 * @property \Jasara\AmznSPA\Resources\MerchantFulfillmentResource $merchant_fulfillment
 * @property \Jasara\AmznSPA\Resources\NotificationsResource $notifications
 * @property \Jasara\AmznSPA\Resources\OrdersResource $orders
 * @property \Jasara\AmznSPA\Resources\ProductPricingResource $product_pricing
 * @property \Jasara\AmznSPA\Resources\ReportsResource $reports
 * @property \Jasara\AmznSPA\Resources\ShippingResource $shipping
 * @property \Jasara\AmznSPA\Resources\FulfillmentOutboundResource $fulfillment_outbound
 * @property \Jasara\AmznSPA\Resources\TokensResource $tokens
 * @property \Jasara\AmznSPA\Resources\SellersResource $sellers
 * @property \Jasara\AmznSPA\Resources\ProductFeesResource $product_fees
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
