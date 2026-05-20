<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitShipmentConfirmationsRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $shipment_confirmations = null,
    ) {}
}
