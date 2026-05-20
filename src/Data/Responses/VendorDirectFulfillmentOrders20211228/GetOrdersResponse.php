<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228\OrderListSchema;

class GetOrdersResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?OrderListSchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
