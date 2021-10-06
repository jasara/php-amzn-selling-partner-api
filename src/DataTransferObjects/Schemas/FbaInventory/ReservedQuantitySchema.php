<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Spatie\DataTransferObject\DataTransferObject;

class ReservedQuantitySchema extends DataTransferObject
{
    public ?int $total_reserved_quantity;

    public ?int $pending_customer_order_quantity;

    public ?int $pending_transshipment_quantity;

    public ?int $fc_processing_quantity;
}
