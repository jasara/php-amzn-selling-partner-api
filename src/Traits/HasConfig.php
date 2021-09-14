<?php

namespace Jasara\AmznSPA\Traits;

use Jasara\AmznSPA\DTOs\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\AmznSPAException;

trait HasConfig
{
    protected AmznSPAConfig $config;

    private function setupConfig(AmznSPAConfig $config)
    {
        $this->config = $config;
    }

    public function getAccessToken(): string
    {
        if (! $this->config->lwa_access_token) {
            throw new AmznSPAException('Access token not available');
        }

        return $this->config->lwa_access_token;
    }

    public function getMarketplaceId(): string
    {
        return $this->config->marketplace_id;
    }
}
