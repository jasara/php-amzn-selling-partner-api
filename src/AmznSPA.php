<?php

namespace Jasara\AmznSPA;

use Jasara\AmznSPA\DTOs\AmznSPAConfig;
use Jasara\AmznSPA\Resources\OAuthResource;
use Jasara\AmznSPA\Traits\HasConfig;
use LazyProperty\LazyPropertiesTrait;

class AmznSPA
{
    use HasConfig, LazyPropertiesTrait;

    public $oauth;

    public function __construct(AmznSPAConfig $config)
    {
        $this->initLazyProperties(['oauth']);

        $this->setupConfig($config);
    }

    private function getOauth(): OAuthResource
    {
        return $this->oauth ?: $this->oauth = new OAuthResource($this->config->marketplace_id);
    }
}
