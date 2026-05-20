<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?string $title = null,
        public ?ItemQuantitySchema $ordered_quantity = null,
        public ?ScheduledDeliveryShipmentSchema $scheduled_delivery_shipment = null,
        public ?GiftDetailsSchema $gift_details = null,
        public ?MoneySchema $net_price = null,
        public ?TaxItemDetailsSchema $tax_details = null,
        public ?MoneySchema $total_price = null,
        public ?BuyerCustomizedInfoDetailSchema $buyer_customized_info = null,
    ) {}
}
