<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxCollectionSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['MarketplaceFacilitator'])]
        public ?string $model,
        #[StringEnumValidator(['Amazon Services, Inc.', ''])]
        public ?string $responsible_party,
    ) {
    }
}
