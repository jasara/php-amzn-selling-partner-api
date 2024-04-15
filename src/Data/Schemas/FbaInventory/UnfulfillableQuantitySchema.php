<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Spatie\DataTransferObject\DataTransferObject;

class UnfulfillableQuantitySchema extends DataTransferObject
{
    public ?int $total_unfillable_quantity;

    public ?int $customer_damaged_quantity;

    public ?int $warehouse_damaged_quantity;

    public ?int $distributor_damaged_quantity;

    public ?int $carrier_damaged_quantity;

    public ?int $defective_quantity;

    public ?int $expired_quantity;
}
