<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportLabelSchema extends BaseSchema
{
    public function __construct(
        public ?string $label_create_date_time = null,
        public ?ShipmentInformationSchema $shipment_information = null,
        public ?array $label_data = null,
    ) {}
}
