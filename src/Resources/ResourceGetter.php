<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAConfig;
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
        $this->validateConfigParameters($this->config, ['marketplace_id', 'redirect_url', 'lwa_client_id', 'lwa_client_secret']);

        return new OAuthResource(
            $this->config->http,
            $this->config->marketplace_id,
            $this->config->redirect_url,
            $this->config->lwa_client_id,
            $this->config->lwa_client_secret,
        );
    }
}
