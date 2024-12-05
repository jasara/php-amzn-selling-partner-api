<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ResourceGetter
{
    use ValidatesParameters;

    public function __construct(
        private AmznSPAConfig $config,
    ) {
    }

    public function getLwa(): LwaResource
    {
        $this->validateObjectProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret']);

        return new LwaResource(
            $this->config->getHttp(),
            $this->config->getMarketplace(),
            $this->config->getRedirectUrl(),
            $this->config->getApplicationKeys(),
            $this->config->getSaveLwaTokensCallback(),
            $this->config->getAuthenticationExceptionCallback(),
            $this->config->getResponseCallback(),
        );
    }

    public function getNotifications(): NotificationsResource
    {
        return $this->constructResource(NotificationsResource::class, 'notifications');
    }

    public function getFulfillmentInbound(): FulfillmentInbound\FulfillmentInboundV0Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInboundV0Resource::class);
    }

    public function getFulfillmentInboundV0(): FulfillmentInbound\FulfillmentInboundV0Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInboundV0Resource::class);
    }

    public function getFulfillmentInbound20240320(): FulfillmentInbound\FulfillmentInbound20240320Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInbound20240320Resource::class);
    }

    public function getFeeds(): FeedsResource
    {
        return $this->constructResource(FeedsResource::class);
    }

    public function getReports(): ReportsResource
    {
        return $this->constructResource(ReportsResource::class);
    }

    public function getCatalogItems(): CatalogItems\CatalogItems20201201Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20201201Resource::class);
    }

    public function getCatalogItems20201201(): CatalogItems\CatalogItems20201201Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20201201Resource::class);
    }

    public function getCatalogItems20220401(): CatalogItems\CatalogItems20220401Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20220401Resource::class);
    }

    public function getFbaInventory(): FbaInventoryResource
    {
        return $this->constructResource(FbaInventoryResource::class);
    }

    public function getProductPricing(): ProductPricingResource
    {
        return $this->constructResource(ProductPricingResource::class);
    }

    public function getFulfillmentOutbound(): FulfillmentOutboundResource
    {
        return $this->constructResource(FulfillmentOutboundResource::class);
    }

    public function getMerchantFulfillment(): MerchantFulfillmentResource
    {
        return $this->constructResource(MerchantFulfillmentResource::class);
    }

    public function getShipping(): ShippingResource
    {
        return $this->constructResource(ShippingResource::class);
    }

    public function getFbaInboundEligibility(): FbaInboundEligibilityResource
    {
        return $this->constructResource(FbaInboundEligibilityResource::class);
    }

    public function getOrders(): OrdersResource
    {
        return $this->constructResource(OrdersResource::class);
    }

    public function getTokens(): TokensResource
    {
        return $this->constructResource(TokensResource::class);
    }

    public function getSellers(): SellersResource
    {
        return $this->constructResource(SellersResource::class);
    }

    public function getUploads(): UploadsResource
    {
        return $this->constructResource(UploadsResource::class);
    }

    public function getProductFees(): ProductFeesResource
    {
        return $this->constructResource(ProductFeesResource::class);
    }

    public function getProductTypeDefinitions(): ProductTypeDefinitionsResource
    {
        return $this->constructResource(ProductTypeDefinitionsResource::class);
    }

    public function getListingsItems(): ListingsItemsResource
    {
        return $this->constructResource(ListingsItemsResource::class);
    }

    private function constructResource(string $class, ?string $grantless_resource = null): ResourceContract
    {
        $url = $this->config->getProxy() ? $this->config->getProxy()->url : $this->config->getMarketplace()->getBaseUrl();

        return new $class(
            $this->validateAndSetupHttpForStandardResource($grantless_resource),
            $url,
        );
    }

    private function validateAndSetupHttpForStandardResource(?string $grantless_resource = null): AmznSPAHttp
    {
        if (! $this->config->getProxy()) {
            $this->validateObjectProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);

            if (! $grantless_resource) {
                $this->validateObjectProperties($this->config->getTokens(), ['refresh_token']);
            }
        }

        return new AmznSPAHttp($this->config, $grantless_resource);
    }
}
