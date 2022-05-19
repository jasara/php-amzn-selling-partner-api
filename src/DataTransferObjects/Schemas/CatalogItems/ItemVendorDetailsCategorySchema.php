<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemVendorDetailsCategorySchema extends DataTransferObject
{
    public ?string $display_name;

    public ?string $value;
}
