<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReasonCodeDetailsSchema extends BaseSchema
{
    public function __construct(
        public string $return_reason_code,
        public string $description,
        public ?string $translated_description,
    ) {
    }
}
