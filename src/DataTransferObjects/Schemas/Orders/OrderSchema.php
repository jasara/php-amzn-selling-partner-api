<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class OrderSchema extends DataTransferObject
{
    public string $amazon_order_id;

    public ?string $seller_order_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $purchase_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $last_update_date;

    #[StringEnumValidator(AmazonEnums::ORDER_STATUS)]
    public string $order_status;

    #[StringEnumValidator(['MFN', 'AFN'])]
    public ?string $fulfillment_channel;

    public ?string $Sales_channel;

    public ?string $order_channel;

    public ?string $ship_service_level;

    public MoneySchema $order_total;

    public ?int $number_of_items_shipped;

    public ?int $number_of_items_unshipped;

    public ?PaymentExecutionDetailItemListSchema $payment_execution_detail;

    #[StringEnumValidator(['COD', 'CVS', 'Other'])]
    public ?string $payment_method;

    #[CastWith(ArrayCaster::class)]
    public ?PaymentMethodDetailItemListSchema $payment_method_details;

    public ?string $marketplace_id;

    public ?string $shipment_service_level_category;

    public ?string $easy_ship_shipment_status;

    public ?string $cba_displayable_shipping_label;

    #[StringEnumValidator(AmazonEnums::ORDER_TYPE)]
    public ?string $order_type;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $earliest_ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $latest_ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $earliest_delivery_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $latest_delivery_date;

    public ?bool $is_business_order;

    public ?bool $is_prime;

    public ?bool $is_premium_order;

    public ?bool $is_global_express_enabled;

    public ?string $replaced_order_id;

    public ?bool $is_replacement_order;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $promise_response_due_date;

    public ?bool $is_estimated_ship_date_set;

    public ?bool $is_sold_by_ab; //check IsSoldByAB if it is camel case

    public ?AddressSchema $default_ship_from_location_address;

    public ?FulfillmentInstructionSchema $fulfillment_instruction;

    public ?bool $is_ispu;

    public ?MarketplaceTaxInfoSchema $marketplace_tax_info;

    public ?string $seller_display_name;

    public ?AddressSchema $shipping_address;

    public BuyerInfoSchema $buyer_info;
}
