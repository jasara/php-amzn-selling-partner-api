<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInventoryUpdateRequestSchema extends BaseSchema
{
    public function __construct(
        public ?InventoryUpdateSchema $inventory = null,
    ) {}
}
