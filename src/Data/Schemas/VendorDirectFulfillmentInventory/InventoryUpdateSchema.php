<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InventoryUpdateSchema extends BaseSchema
{
    public function __construct(
        public ?PartyIdentificationSchema $selling_party = null,
        public ?bool $is_full_update = null,
        public ?array $items = null,
    ) {}
}
