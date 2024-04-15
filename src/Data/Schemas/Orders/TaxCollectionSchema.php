<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TaxCollectionSchema extends DataTransferObject
{
    #[StringEnumValidator(['MarketplaceFacilitator'])]
    public ?string $model;

    #[StringEnumValidator(['Amazon Services, Inc.'])]
    public ?string $responsible_party;
}
