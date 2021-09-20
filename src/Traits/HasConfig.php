<?php

namespace Jasara\AmznSPA\Traits;

use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\AmznSPAException;

trait HasConfig
{
    private AmznSPAConfig $config;

    private function setupConfig(AmznSPAConfig $config)
    {
        $this->config = $config;
    }

    public function getAccessToken(): string
    {
        $tokens = $this->config->getTokens();
        if (! $tokens->access_token) {
            throw new AmznSPAException('Access token not available');
        }

        return $tokens->access_token;
    }

    public function getMarketplaceId(): string
    {
        return $this->config->getMarketplace()->getIdentifier();
    }
}
