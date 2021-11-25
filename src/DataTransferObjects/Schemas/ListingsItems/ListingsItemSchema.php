<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemSummaryByMarketplaceSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListingsItemSchema extends DataTransferObject
{
    public string $sku;

    #[CastWith(ArrayCaster::class, itemType: ItemSummaryByMarketplaceSchema::class)]
    public ?ItemSummariesSchema $summaries;

    public ?object $attributes;

    #[CastWith(ArrayCaster::class, itemType: IssueSchema::class)]
    public ?IssuesSchema $issues;

    #[CastWith(ArrayCaster::class, itemType: ItemOfferByMarketplaceSchema::class)]
    public ?ItemOffersSchema $offers;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentAvailabilitySchema::class)]
    public ?FulfillmentAvailability $fulfillment_availability;

    public ?ItemProcurementSchema $procurement;
}
