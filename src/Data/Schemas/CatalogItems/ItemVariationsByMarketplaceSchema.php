<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemVariationsByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public array $asins;

    #[StringEnumValidator(['PARENT', 'CHILD'])]
    public string $variation_type;
}
