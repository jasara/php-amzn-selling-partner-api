<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping\PackingSlipListSchema;

class GetPackingSlipsResponse extends BaseResponse
{
    public function __construct(
        public ?PackingSlipListSchema $payload = null,
    ) {}

}
