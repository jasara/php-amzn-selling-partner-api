<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PrepDetailsSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
        public ?string $prep_instruction,
        #[StringEnumValidator(['AMAZON', 'SELLER'])]
        public ?string $prep_owner,
    ) {
    }
}
