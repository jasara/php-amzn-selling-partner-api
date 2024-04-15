<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentAvailabilitySchema extends DataTransferObject
{
    public string $fulfillment_channel_code;

    public ?int $quantity;
}
