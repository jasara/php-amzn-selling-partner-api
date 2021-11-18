<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class InvalidReturnItemSchema extends DataTransferObject
{
    public string $seller_return_item_id;

    public string $seller_fulfillment_order_item_id;

    public InvalidItemReasonSchema $invalid_item_reason;
}
