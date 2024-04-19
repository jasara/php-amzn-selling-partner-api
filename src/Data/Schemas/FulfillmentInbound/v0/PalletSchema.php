<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class PalletSchema extends BaseSchema
{
    public function __construct(
        public ?DimensionsSchema $dimensions,
        public ?WeightSchema $weight,
        public ?bool $is_stacked,
    ) {
    }
}
