<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201\ItemListSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
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
