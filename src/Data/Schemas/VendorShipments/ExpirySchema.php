<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ExpirySchema extends BaseSchema
{
    public function __construct(
        public ?string $manufacturer_date = null,
        public ?string $expiry_date = null,
        public ?DurationSchema $expiry_after_duration = null,
    ) {}
}
