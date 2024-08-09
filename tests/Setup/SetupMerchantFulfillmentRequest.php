<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\MerchantFulfillmentAddressSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;

trait SetupMerchantFulfillmentRequest
{
    public function shipmentRequestDetails(): ShipmentRequestDetailsSchema
    {
        $setup_address = $this->setupAddress();
        $address = MerchantFulfillmentAddressSchema::from($setup_address->toArray());

        return ShipmentRequestDetailsSchema::from(
            amazon_order_id: '52986411826454',
            item_list: [
                'item' => [
                    'asin' => 'B07H8Q3JYV',
                    'order_item_id' => Str::random(),
                    'quantity' => rand(1, 10),
                ],
            ],
            ship_from_address: $address,
            package_dimensions: [
                'length' => 88,
            ],
            weight: [
                'value' => 77,
                'unit' => 'oz',
            ],
            shipping_service_options: [
                'delivery_experience' => 'DeliveryConfirmationWithAdultSignature',
                'carrier_will_pick_up' => false,
            ],
            shipping_service_id: Str::random(),
            label_customization: [
                'custom_text_for_label' => '988989i',
            ],
        );
    }
}
