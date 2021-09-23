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

    public function getAuth(): AuthResource
    {
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret']);

        return new AuthResource(
            $this->config->getHttp(),
            $this->config->getMarketplace(),
            $this->config->isPropertySet('redirect_url') ? $this->config->getRedirectUrl() : null,
            $this->config->getApplicationKeys(),
        );
    }

    public function getNotifications(): NotificationsResource
    {
        $http = $this->validateAndSetupHttpForStandardResource();

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

    private function validateAndSetupHttpForStandardResource(): AmznSPAHttp
    {
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);
        $this->validateDtoProperties($this->config->getTokens(), ['refresh_token']);

        return new AmznSPAHttp($this->config, 'notifications');
    }
}
