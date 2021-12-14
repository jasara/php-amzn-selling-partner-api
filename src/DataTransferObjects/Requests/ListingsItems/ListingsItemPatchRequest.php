<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\PatchesSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\PatchOperationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ListingsItemPatchRequest extends BaseRequest
{
    public string $product_type;

    #[CastWith(ArrayCaster::class, itemType: PatchOperationSchema::class)]
    public PatchesSchema $patches;
}
