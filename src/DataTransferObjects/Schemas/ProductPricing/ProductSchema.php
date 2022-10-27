<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ProductSchema extends DataTransferObject
{
    public IdentifierTypeSchema $identifiers;

    public ?array $attribute_sets;

    public ?array $relationships;

    public ?CompetitivePricingTypeSchema $competitive_pricing;

    #[CastWith(ArrayCaster::class, itemType: SalesRankTypeSchema::class)]
    public ?SalesRankListSchema $sales_rankings;

    #[CastWith(ArrayCaster::class, itemType: OfferSchema::class)]
    public ?OffersListSchema $offers;
}
