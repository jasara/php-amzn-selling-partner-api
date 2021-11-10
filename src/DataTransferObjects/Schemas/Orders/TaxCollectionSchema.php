<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TaxCollectionSchema extends DataTransferObject
{
    #[StringEnumValidator(['MarketplaceFacilitator'])]
    public ?string $model;

    #[StringEnumValidator(['Amazon Services, Inc.'])]
    public ?string $responsible_party;
}
