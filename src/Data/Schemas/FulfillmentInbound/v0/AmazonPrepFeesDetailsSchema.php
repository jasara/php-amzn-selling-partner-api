<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AmazonPrepFeesDetailsSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
        public ?string $prep_instruction,
        public ?AmountSchema $fee_per_unit,
    ) {
    }
}
