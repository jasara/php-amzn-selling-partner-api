<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentDatesSchema extends BaseSchema
{
    public function __construct(
        public ?string $required_ship_date = null,
        public ?string $promised_delivery_date = null,
    ) {}
}
