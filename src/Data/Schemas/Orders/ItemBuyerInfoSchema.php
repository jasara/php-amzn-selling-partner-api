<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class ItemBuyerInfoSchema extends BaseSchema
{
    public function __construct(
        public ?BuyerCustomizedInfoDetailSchema $buyer_customized_info,
        public ?MoneySchema $gift_wrap_price,
        public ?MoneySchema $gift_wrap_tax,
        public ?string $gift_message_text,
        public ?string $gift_wrap_level,
    ) {
    }
}
