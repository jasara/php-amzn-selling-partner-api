<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListingsItemSchema extends DataTransferObject
{
    public string $sku;

    #[CastWith(ArrayCaster::class, itemType: ItemSummaryByMarketplaceSchema::class)]
    public ?ItemSummaryListSchema $summaries;

    public ?array $attributes;

    #[CastWith(ArrayCaster::class, itemType: IssueSchema::class)]
    public ?IssuesListSchema $issues;

    #[CastWith(ArrayCaster::class, itemType: ItemOfferByMarketplaceSchema::class)]
    public ?ItemOfferListSchema $offers;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentAvailabilitySchema::class)]
    public ?FulfillmentAvailabilityListSchema $fulfillment_availability;

    public ?ItemProcurementSchema $procurement;
}
