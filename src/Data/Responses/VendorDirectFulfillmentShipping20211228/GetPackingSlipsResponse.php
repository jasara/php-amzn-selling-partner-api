<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228\PackingSlipListSchema;

class GetPackingSlipsResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?PackingSlipListSchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
