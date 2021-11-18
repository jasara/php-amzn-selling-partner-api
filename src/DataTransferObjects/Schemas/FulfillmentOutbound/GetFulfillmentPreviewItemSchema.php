<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Spatie\DataTransferObject\DataTransferObject;

class GetFulfillmentPreviewItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public int $quantity;

    public ?AmountSchema $per_unit_declared_value;

    public string $seller_fulfillment_order_item_id;
}
