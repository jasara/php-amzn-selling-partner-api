<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public string $order_item_id,
        public int $quantity,
        public ?WeightSchema $item_weight,
        public ?string $item_description,
        public ?array $transparency_code_list,
        public ?AdditionalSellerInputsListSchema $item_level_seller_inputs_list,
    ) {
    }
}
