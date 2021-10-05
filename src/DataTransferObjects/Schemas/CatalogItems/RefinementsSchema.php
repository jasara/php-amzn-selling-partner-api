<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class RefinementsSchema extends DataTransferObject
{
    public BrandRefinementSchema $brands;

    public ?ClassificationRefinementSchema $classifications;
}
