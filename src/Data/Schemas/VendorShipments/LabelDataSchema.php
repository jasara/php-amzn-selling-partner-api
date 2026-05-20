<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelDataSchema extends BaseSchema
{
    public function __construct(
        public ?int $label_sequence_number = null,
        public ?string $label_format = null,
        public ?string $carrier_code = null,
        public ?string $tracking_id = null,
        public ?string $label = null,
    ) {}
}
