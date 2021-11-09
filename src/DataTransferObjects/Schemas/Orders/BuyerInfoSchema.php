<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class BuyerInfoSchema extends DataTransferObject
{
    public ?string $buyer_email;

    public ?string $buyer_name;

    public ?string $buyer_county;

    public ?BuyerTaxInfoSchema $buyer_tax_info;

    public ?string $purchase_order_number;
}
