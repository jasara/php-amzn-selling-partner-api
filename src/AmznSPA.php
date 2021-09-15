<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Factory;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Traits\HasConfig;

/**
 * @property \Jasara\AmznSPA\Resources\OAuthResource $oauth
 */
class AmznSPA
{
    use HasConfig;

    private $resource_cache = [];

    public function __construct(AmznSPAConfig $config)
    {
        $this->setupConfig($config);
    }

    public function __get($name)
    {
        if (! isset($this->resource_cache[$name])) {
            $function = 'get' . ucfirst($name);

            $resource_getter = new ResourceGetter($this->config);

            if (! method_exists($resource_getter, $function)) {
                throw new InvalidResourceException($name . ' is not a supported resource.');
            }

            $this->resource_cache[$name] = $resource_getter->{$function}();
        }

        return $this->resource_cache[$name];
    }

    public function usingMarketplace(string $marketplace_id): self
    {
        $config = clone $this->config;
        $config->marketplace_id = $marketplace_id;

        return new self($config);
    }

    public function usingHttp(Factory $http): self
    {
        $config = clone $this->config;
        $config->http = $http;

        return new self($config);
    }
}
