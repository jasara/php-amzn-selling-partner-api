<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class OrderSchema extends BaseSchema
{
    public function __construct(
        public string $amazon_order_id,
        public ?string $seller_order_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $purchase_date,
        #[CarbonFromStringCaster]
        public CarbonImmutable $last_update_date,
        public string $order_status,
        public ?string $fulfillment_channel,
        public ?string $Sales_channel,
        public ?string $order_channel,
        public ?string $ship_service_level,
        public ?MoneySchema $order_total,
        public ?int $number_of_items_shipped,
        public ?int $number_of_items_unshipped,
        public ?PaymentExecutionDetailItemListSchema $payment_execution_detail,
        public ?string $payment_method,
        public ?array $payment_method_details,
        public ?string $marketplace_id,
        public ?string $shipment_service_level_category,
        public ?string $easy_ship_shipment_status,
        public ?string $cba_displayable_shipping_label,
        public ?string $order_type,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_delivery_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_delivery_date,
        public ?bool $is_business_order,
        public ?bool $is_prime,
        public ?bool $is_premium_order,
        public ?bool $is_global_express_enabled,
        public ?string $replaced_order_id,
        public ?bool $is_replacement_order,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $promise_response_due_date,
        public ?bool $is_estimated_ship_date_set,
        public ?bool $is_sold_by_ab,
        public ?OrderAddressDetailSchema $default_ship_from_location_address,
        public ?FulfillmentInstructionSchema $fulfillment_instruction,
        public ?bool $is_ispu,
        public ?MarketplaceTaxInfoListSchema $marketplace_tax_info,
        public ?string $seller_display_name,
        public ?OrderAddressDetailSchema $shipping_address,
        public ?BuyerInfoSchema $buyer_info,
    ) {
    }
}
