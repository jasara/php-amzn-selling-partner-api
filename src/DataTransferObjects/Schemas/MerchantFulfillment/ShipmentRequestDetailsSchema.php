<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ShipmentRequestDetailsSchema extends DataTransferObject
{
    public string $amazon_order_id;

    public ?string $seller_order_id;

    #[CastWith(ArrayCaster::class, itemType: ItemSchema::class)]
    public ItemListSchema $item_list;

    public AddressSchema $ship_from_address;

    public PackageDimensionsSchema $package_dimensions;

    public WeightSchema $weight;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $must_arrive_by_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $ship_date;

    public ShippingServiceOptionsSchema $shipping_service_options;

    public ?LabelCustomizationSchema $label_customization;
}
