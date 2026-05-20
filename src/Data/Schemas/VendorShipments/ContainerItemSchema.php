<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainerItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_reference = null,
        public ?ItemQuantitySchema $shipped_quantity = null,
        public ?ItemDetailsSchema $item_details = null,
    ) {}
}
