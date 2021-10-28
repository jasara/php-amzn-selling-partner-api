<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ShipmentSchema extends DataTransferObject
{
    public string $shipment_id;

    public string $amazon_order_id;

    public ?string $seller_order_id;

    #[CastWith(ArrayCaster::class, itemType: ItemSchema::class)]
    public ItemListSchema $item_list;

    public AddressSchema $ship_from_address;

    public AddressSchema $ship_to_address;

    public PackageDimensionsSchema $package_dimensions;

    public WeightSchema $weight;

    public MoneySchema $insurance;

    public ShippingServiceSchema $shipping_service;

    public LabelSchema $label;

    #[StringEnumValidator(['Purchased', 'RefundPending', 'RefundRejected', 'RefundApplied'])]
    public string $status;

    public ?string $tracking_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $created_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $last_update_date;
}
