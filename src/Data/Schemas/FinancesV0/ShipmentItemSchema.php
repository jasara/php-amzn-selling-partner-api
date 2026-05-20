<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_sku = null,
        public ?string $order_item_id = null,
        public ?string $order_adjustment_item_id = null,
        public ?int $quantity_shipped = null,
        public ?ChargeComponentListSchema $item_charge_list = null,
        public ?ChargeComponentListSchema $item_charge_adjustment_list = null,
        public ?FeeComponentListSchema $item_fee_list = null,
        public ?FeeComponentListSchema $item_fee_adjustment_list = null,
        public ?TaxWithheldComponentListSchema $item_tax_withheld_list = null,
        public ?PromotionListSchema $promotion_list = null,
        public ?PromotionListSchema $promotion_adjustment_list = null,
        public ?CurrencySchema $cost_of_points_granted = null,
        public ?CurrencySchema $cost_of_points_returned = null,
    ) {}
}
