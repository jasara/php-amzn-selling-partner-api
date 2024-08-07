<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredLtlDataOutputSchema extends BaseSchema
{
    public function __construct(
        public ?string $carrier_name,
        public ?string $pro_number,
    ) {
    }
}
