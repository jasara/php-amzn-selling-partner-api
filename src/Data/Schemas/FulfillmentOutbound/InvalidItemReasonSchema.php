<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidItemReasonSchema extends DataTransferObject
{
    #[StringEnumValidator(['InvalidValues', 'DuplicateRequest', 'NoCompletedShipItems', 'NoReturnableQuantity'])]
    public string $invalid_item_reason_code;

    public string $description;
}
