<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvalidItemReasonSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['InvalidValues', 'DuplicateRequest', 'NoCompletedShipItems', 'NoReturnableQuantity'])]
        public string $invalid_item_reason_code,
        public string $description,
    ) {
    }
}
