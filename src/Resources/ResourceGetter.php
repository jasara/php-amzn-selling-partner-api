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
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret']);

        return new LwaResource(
            $this->config->getHttp(),
            $this->config->getMarketplace(),
            $this->config->isPropertySet('redirect_url') ? $this->config->getRedirectUrl() : null,
            $this->config->getApplicationKeys(),
            $this->config->isPropertySet('save_lwa_tokens_callback') ? $this->config->getSaveLwaTokensCallback() : null,
            $this->config->isPropertySet('authentication_exception_callback') ? $this->config->getAuthenticationExceptionCallback() : null,
            $this->config->isPropertySet('response_callback') ? $this->config->getResponseCallback() : null,
        );
    }

    public function getAuthorization(): AuthorizationResource
    {
        return $this->constructResource(AuthorizationResource::class, 'migration');
    }

    public function getNotifications(): NotificationsResource
    {
        return $this->constructResource(NotificationsResource::class, 'notifications');
    }

    public function getFulfillmentInbound(): FulfillmentInboundResource
    {
        return $this->constructResource(FulfillmentInboundResource::class);
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

    public function getListingsItems(): ListingsItemsResource
    {
        return $this->constructResource(ListingsItemsResource::class);
    }

    private function constructResource(string $class, ?string $grantless_resource = null): ResourceContract
    {
        return new $class(
            $this->validateAndSetupHttpForStandardResource($grantless_resource),
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    private function validateAndSetupHttpForStandardResource(?string $grantless_resource = null): AmznSPAHttp
    {
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);
        if (! $grantless_resource) {
            $this->validateDtoProperties($this->config->getTokens(), ['refresh_token']);
        }

        return new AmznSPAHttp($this->config, $grantless_resource);
    }
}
