<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;

trait SetupMerchantFulfillmentRequest
{
    public function shipmentRequestDetails(): ShipmentRequestDetailsSchema
    {
        return new ShipmentRequestDetailsSchema(
            amazon_order_id : '52986411826454',
            item_list : [
                'item' => [
                    'order_item_id' => Str::random(),
                    'quantity' => rand(1, 10),
                ],
            ],
            ship_from_address : $this->setupAddress()->toArray(),
            package_dimensions : [
                'length' => 88,
            ],
            weight : [
                'value' => 77,
                'unit' => 'oz',
            ],
            shipping_service_options : [
                'delivery_experience' => 'DeliveryConfirmationWithAdultSignature',
                'carrier_will_pick_up' => false,
            ],
            shipping_service_id : Str::random(),
            label_customization : [
                'custom_text_for_label' => '988989i',
            ],
        );
    }
}
