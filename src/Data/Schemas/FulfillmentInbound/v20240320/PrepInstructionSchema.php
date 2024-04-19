<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PrepInstructionSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $fee,
        public ?PrepOwner $prep_owner,
        public ?PrepType $prep_type,
    ) {
    }
}
