<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Spatie\DataTransferObject\DataTransferObject;

class InventoryDetailsSchema extends DataTransferObject
{
    public ?int $fulfillable_quantity;

    public ?int $inbound_working_quantity;

    public ?int $inbound_shipped_quantity;

    public ?int $inbound_receiving_quantity;

    public ?ReservedQuantitySchema $reserved_quantity;

    public ?ResearchingQuantitySchema $researching_quantity;

    public ?UnfulfillableQuantitySchema $unfillable_quantity;
}
