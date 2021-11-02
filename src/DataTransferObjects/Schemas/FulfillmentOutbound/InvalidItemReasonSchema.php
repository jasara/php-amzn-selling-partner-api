<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidItemReasonSchema extends DataTransferObject
{
    #[StringEnumValidator(['InvalidValues', 'DuplicateRequest', 'NoCompletedShipItems', 'NoReturnableQuantity'])]
    public string $invalid_item_reason_code;

    public string $description;
}
