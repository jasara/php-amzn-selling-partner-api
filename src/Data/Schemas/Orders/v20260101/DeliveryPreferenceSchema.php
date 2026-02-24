<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class DeliveryPreferenceSchema extends BaseSchema
{
    public function __construct(
        public ?string $drop_off_location,
        public ?string $address_instruction,
        public ?PreferredDeliveryTimeSchema $delivery_time,
        public ?array $delivery_capabilities,
    ) {
    }
}
