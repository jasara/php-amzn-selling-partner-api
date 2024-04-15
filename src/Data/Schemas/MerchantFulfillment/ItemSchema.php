<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSchema extends DataTransferObject
{
    public string $order_item_id;

    public int $quantity;

    public ?WeightSchema $item_weight;

    public ?string $item_description;

    public ?TransparencyCodeListSchema $transparency_code_list;

    public ?AdditionalSellerInputsListSchema $item_level_seller_inputs_list;
}
