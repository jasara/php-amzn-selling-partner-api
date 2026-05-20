<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DimensionsSchema extends BaseSchema
{
    public function __construct(
        public ?string $length = null,
        public ?string $width = null,
        public ?string $height = null,
        public ?string $unit_of_measure = null,
    ) {}
}
