<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeeSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::NAME)]
        public string $name,
        public AmountSchema $amount,
    ) {
    }
}
