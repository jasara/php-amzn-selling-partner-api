<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class BrandRefinementSchema extends DataTransferObject
{
    public int $number_of_results;

    public string $brand_name;
}
