<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;

class ResourceGetter
{
    public function __construct(
        private AmznSPAConfig $config,
    ) {
    }

    public function getOauth(): OAuthResource
    {
        $this->requiredParameters(['marketplace_id', 'lwa_client_id', 'lwa_client_secret']);

        return new OAuthResource(
            $this->config->marketplace_id,
            $this->config->lwa_client_id,
            $this->config->lwa_client_secret,
        );
    }

    private function requiredParameters(array $parameters)
    {
        foreach ($parameters as $parameter) {
            if (! $this->config->$parameter) {
                throw new InvalidParametersException(Str::title($parameter) . ' is not set on config.');
            }
        }
    }
}
