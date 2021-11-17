<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\CreateReturnItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\CreateReturnItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateFulfillmentReturnRequest extends BaseRequest
{
    #[CastWith(ArrayCaster::class, itemType:CreateReturnItemSchema::class)]
    public CreateReturnItemListSchema $items;
}
