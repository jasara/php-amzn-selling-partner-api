<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class ShipmentSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
        public string $amazon_order_id,
        public ?string $seller_order_id,

        public ItemListSchema $item_list,
        public AddressSchema $ship_from_address,
        public AddressSchema $ship_to_address,
        public PackageDimensionsSchema $package_dimensions,
        public WeightSchema $weight,
        public MoneySchema $insurance,
        public ShippingServiceSchema $shipping_service,
        public LabelSchema $label,
        #[StringEnumValidator(['Purchased', 'RefundPending', 'RefundRejected', 'RefundApplied'])]
        public string $status,
        public ?string $tracking_id,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $created_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $last_update_date,
    ) {
    }
}
