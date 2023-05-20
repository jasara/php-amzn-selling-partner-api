<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
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
