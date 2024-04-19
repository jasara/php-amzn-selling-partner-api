<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvalidSkuSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_sku,
        #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
        public ?string $error_reason,
    ) {
    }
}
