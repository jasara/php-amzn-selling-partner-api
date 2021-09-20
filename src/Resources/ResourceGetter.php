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

    public function getOauth(): OAuthResource
    {
        $this->validateConfigParameters($this->config, ['redirect_url']);
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret']);

        return new OAuthResource(
            $this->config->getHttp(),
            $this->config->getMarketplace(),
            $this->config->getRedirectUrl(),
            $this->config->getApplicationKeys(),
        );
    }

    public function getNotifications(): NotificationsResource
    {
        $this->validateDtoProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);
        $this->validateDtoProperties($this->config->getTokens(), ['refresh_token']);

        $http = new AmznSPAHttp($this->config);

        return new NotificationsResource(
            $http,
            $this->config->getMarketplace()->getBaseUrl(),
        );
    }
}
