<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportHeaderSchema extends BaseSchema
{
    public function __construct(
        public string $seller_id,
        public string $shipment_id,
        public ?bool $is_partnered,
        #[StringEnumValidator(['SP', 'LTL'])]
        public string $shipment_type,
    ) {
    }
}
