<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSchema extends DataTransferObject
{
    public string $order_item_id;

    public int $quantity;

    public ?WeightSchema $item_weight;

    public ?string $item_description;

    public ?TransparencyCodeListSchema $transparency_code_list; //change to array

    public ?AdditionalSellerInputsListSchema $item_level_seller_inputs_list;
}
