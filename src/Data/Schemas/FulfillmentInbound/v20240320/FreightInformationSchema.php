<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FreightInformationSchema extends BaseSchema
{
    public function __construct(
        public ?FreightClass $freight_class,
        public ?CurrencySchema $declared_value,
    ) {
    }
}
