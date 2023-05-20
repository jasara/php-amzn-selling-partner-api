<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Enums\ProductTypeDefinitions\Locale;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AttributeSchema extends DataTransferObject
{
    public string $attribute_name;
    public string $value;

    #[CastWith(BackedEnumCaster::class)]
    public ?Locale $language_tag;
    public string $marketplace_id;
}
