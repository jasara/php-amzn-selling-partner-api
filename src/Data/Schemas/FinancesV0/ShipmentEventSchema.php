<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_order_id = null,
        public ?string $seller_order_id = null,
        public ?string $marketplace_name = null,
        public ?string $store_name = null,
        public ?ChargeComponentListSchema $order_charge_list = null,
        public ?ChargeComponentListSchema $order_charge_adjustment_list = null,
        public ?FeeComponentListSchema $shipment_fee_list = null,
        public ?FeeComponentListSchema $shipment_fee_adjustment_list = null,
        public ?FeeComponentListSchema $order_fee_list = null,
        public ?FeeComponentListSchema $order_fee_adjustment_list = null,
        public ?DirectPaymentListSchema $direct_payment_list = null,
        public ?string $posted_date = null,
        public ?ShipmentItemListSchema $shipment_item_list = null,
        public ?ShipmentItemListSchema $shipment_item_adjustment_list = null,
    ) {}
}
