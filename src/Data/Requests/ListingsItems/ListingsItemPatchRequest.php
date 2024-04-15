<?php

namespace Jasara\AmznSPA\Data\Requests\ListingsItems;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\PatchListSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\PatchOperationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ListingsItemPatchRequest extends BaseRequest
{
    public string $product_type;

    #[CastWith(ArrayCaster::class, itemType: PatchOperationSchema::class)]
    public PatchListSchema $patches;
}
