<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateReturnItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateReturnItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateFulfillmentReturnRequest extends BaseRequest
{
    #[CastWith(ArrayCaster::class, itemType: CreateReturnItemSchema::class)]
    public CreateReturnItemListSchema $items;
}
