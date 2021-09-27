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

class PartneredLtlDataInputSchema extends DataTransferObject
{
    public ?ContactSchema $contact;

    public ?int $box_count;

    #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
    public ?string $seller_freight_class;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $freight_ready_date;

    #[CastWith(ArrayCaster::class, itemType: PalletSchema::class)]
    public ?PalletListSchema $pallet_list;

    public ?WeightSchema $total_weight;

    public ?AmountSchema $seller_declared_value;
}
