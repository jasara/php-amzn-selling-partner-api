<?php

namespace Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpMethod;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\Segment;

class FeaturedOfferExpectedPriceRequest extends BaseRequest
{
    public function __construct(
        public string $marketplace_id,
        public string $sku,
        public string $uri,
        public HttpMethod $method,
        public ?Segment $segment = null,
        public ?array $body = null,
        public ?array $headers = null,
    ) {
    }
}