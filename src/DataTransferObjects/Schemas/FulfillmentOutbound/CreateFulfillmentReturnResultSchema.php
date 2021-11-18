<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CreateFulfillmentReturnResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType:ReturnItemSchema::class)]
    public ?ReturnItemListSchema $return_items;

    #[CastWith(ArrayCaster::class, itemType:InvalidReturnItemSchema::class)]
    public ?InvalidReturnItemListSchema $invalid_return_items;

    #[CastWith(ArrayCaster::class, itemType:ReturnAuthorizationSchema::class)]
    public ?ReturnAuthorizationListSchema $return_authorizations;
}
