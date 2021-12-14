<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ContactSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredLtlDataOutputSchema extends DataTransferObject
{
    public ?ContactSchema $contact;

    public int $box_count;

    #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
    public ?string $seller_freight_class;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $freight_ready_date;

    #[CastWith(ArrayCaster::class, itemType: PalletSchema::class)]
    public ?PalletListSchema $pallet_list;

    public ?WeightSchema $total_weight;

    public ?AmountSchema $seller_declared_value;

    public ?AmountSchema $amazon_calculated_value;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $preview_pickup_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $preview_delivery_date;

    #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
    public ?string $preview_freight_class;

    public ?string $amazon_reference_id;

    public ?bool $is_bill_of_lading_available;

    public ?PartneredEstimateSchema $partnered_estimate;

    public ?string $carrier_name;
}
