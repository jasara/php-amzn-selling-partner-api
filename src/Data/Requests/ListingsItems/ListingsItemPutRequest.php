<?php

namespace Jasara\AmznSPA\Data\Requests\ListingsItems;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ListingsItemPutRequest extends BaseRequest
{
    public string $product_type;

    #[StringEnumValidator(['LISTING', 'LISTING_PRODUCT_ONLY', 'LISTING_OFFER_ONLY'])]
    public ?string $requirements;

    #[CastWith(ArrayCaster::class, itemType: AttributeSchema::class)]
    public AttributesListSchema $attributes;
}
