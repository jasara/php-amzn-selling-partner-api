<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class ProductSchema extends DataTransferObject
{
    public IdentifierTypeSchema $identifiers;

    public ?array $attribute_sets;

    public ?array $relationships;

    public ?CompetitivePricingTypeSchema $competitive_pricing; //schema

    public ?SalesRankListSchema $sales_rankings;

    public ?OffersListSchema $offers;
}
