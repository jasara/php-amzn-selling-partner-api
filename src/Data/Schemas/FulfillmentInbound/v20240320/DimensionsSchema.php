<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\DimensionsSchema as BaseDimensionsSchema;

class DimensionsSchema extends BaseDimensionsSchema
{
    public function __construct(
        public string $length,
        public string $width,
        public string $height,
        public UnitOfMeasurement $unit_of_measurement,
    ) {
        parent::__construct(
            length: $length,
            width: $width,
            height: $height,
            unit: $unit_of_measurement->value,
        );
    }
}
