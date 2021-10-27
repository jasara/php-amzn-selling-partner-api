<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class OrderItemBuyerInfoSchema extends DataTransferObject
{
    public string $order_item_id;

    public ?BuyerCustomizedInfoDetailSchema $buyer_customized_info;

    public ?MoneySchema $gift_wrap_price;

    public ?MoneySchema $gift_wrap_tax;

    public ?string $gift_message_text;

    public ?string $gift_wrap_level;
}
