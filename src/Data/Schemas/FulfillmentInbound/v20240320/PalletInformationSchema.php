<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PalletInformationSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $declared_value,
        public ?FreightClass $freight_class,
        public PalletInputListSchema $pallets,
    ) {
    }
}
