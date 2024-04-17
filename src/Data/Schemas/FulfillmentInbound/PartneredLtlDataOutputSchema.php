<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\ContactSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class PartneredLtlDataOutputSchema extends BaseSchema
{
    public function __construct(
        public ?ContactSchema $contact,
        public int $box_count,
        #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
        public ?string $seller_freight_class,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $freight_ready_date,

        public ?PalletListSchema $pallet_list,
        public ?WeightSchema $total_weight,
        public ?AmountSchema $seller_declared_value,
        public ?AmountSchema $amazon_calculated_value,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $preview_pickup_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $preview_delivery_date,
        #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
        public ?string $preview_freight_class,
        public ?string $amazon_reference_id,
        public ?bool $is_bill_of_lading_available,
        public ?PartneredEstimateSchema $partnered_estimate,
        public ?string $carrier_name,
    ) {
    }
}
