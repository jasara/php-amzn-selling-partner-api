<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetOffersResultSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?string $asin;

    public ?string $sku;

    #[StringEnumValidator(AmazonEnums::ITEM_CONDITION)]
    public string $item_condition;

    public string $status;

    public OfferItemIdentifierSchema $identifier;

    public SummarySchema $summary;

    #[CastWith(ArrayCaster::class, itemType: OfferDetailSchema::class)]
    public OfferDetailListSchema $offers;
}
