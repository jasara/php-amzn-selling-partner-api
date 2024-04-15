<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Casts\CarbonToDateStringMapper;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\ContactSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredLtlDataInputSchema extends DataTransferObject
{
    public ?ContactSchema $contact;

    public ?int $box_count;

    #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
    public ?string $seller_freight_class;

    #[CastWith(CarbonFromStringCaster::class)]
    #[CarbonToDateStringMapper]
    public ?CarbonImmutable $freight_ready_date;

    #[CastWith(ArrayCaster::class, itemType: PalletSchema::class)]
    public ?PalletListSchema $pallet_list;

    public ?WeightSchema $total_weight;

    public ?AmountSchema $seller_declared_value;
}
