<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemVariationsByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public array $asins,
        #[StringEnumValidator(['PARENT', 'CHILD'])]
        public string $variation_type,
    ) {
    }
}
