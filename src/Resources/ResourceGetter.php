<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\AmznSPAHttp;
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
        );
    }

    public function getAuthorization(): AuthorizationResource
    {
        $http = $this->validateAndSetupHttpForStandardResource('migration');

        return new AuthorizationResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getNotifications(): NotificationsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource('notifications');

        return new NotificationsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getFulfillmentInbound(): FulfillmentInboundResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new FulfillmentInboundResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getFeeds(): FeedsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new FeedsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getReports(): ReportsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new ReportsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getCatalogItems(): CatalogItemsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new CatalogItemsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getFbaInventory(): FbaInventoryResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new FbaInventoryResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getProductPricing(): ProductPricingResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new ProductPricingResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getFulfillmentOutbound(): FulfillmentOutboundResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new FulfillmentOutboundResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getMerchantFulfillment(): MerchantFulfillmentResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new MerchantFulfillmentResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getShipping(): ShippingResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new ShippingResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getFbaInboundEligibility(): FbaInboundEligibilityResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new FbaInboundEligibilityResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getOrders(): OrdersResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new OrdersResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getTokens(): TokensResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new TokensResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getSellers(): SellersResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new SellersResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getUploads(): UploadsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new UploadsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    public function getProductFees(): ProductFeesResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

        return new ProductFeesResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }

    private function validateAndSetupHttpForStandardResource($grantless_resource = null): AmznSPAHttp
    {
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);
        if (! $grantless_resource) {
            $this->validateDtoProperties($this->config->getTokens(), ['refresh_token']);
        }

        return new AmznSPAHttp($this->config, $grantless_resource);
    }
}
