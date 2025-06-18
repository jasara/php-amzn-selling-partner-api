<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class HttpHeaders extends BaseSchema
{
    /**
     * @var array<string, string>
     */
    private array $headers = [];

    public function __get($name)
    {
        return $this->headers[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->headers[$name] = $value;
    }

    public function toArray(): array
    {
        return $this->headers;
    }
}