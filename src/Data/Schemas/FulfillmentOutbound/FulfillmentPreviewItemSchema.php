<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentPreviewItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public int $quantity;

    public string $seller_fulfillment_order_item_id;

    public ?WeightSchema $estimated_shipping_weight;

    #[StringEnumValidator(['Package', 'Dimensional'])]
    public ?string $shipping_weight_calculation_method;
}
