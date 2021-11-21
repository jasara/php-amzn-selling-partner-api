<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemSummaryByMarketplaceSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\FulfillmentAvailability;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\FulfillmentAvailabilitySchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\IssueSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ItemIssuesSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ItemOfferByMarketplaceSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ItemOffersSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ItemProcurementSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ItemSummariesSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class Item extends BaseResponse
{
    public string $sku;

    #[CastWith(ArrayCaster::class, itemType: ItemSummaryByMarketplaceSchema::class)]
    public ?ItemSummariesSchema $summaries;

    public ?object $attributes;

    #[CastWith(ArrayCaster::class, itemType: IssueSchema::class)]
    public ?ItemIssuesSchema $issues;

    #[CastWith(ArrayCaster::class, itemType: ItemOfferByMarketplaceSchema::class)]
    public ?ItemOffersSchema $offers;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentAvailabilitySchema::class)]
    public ?FulfillmentAvailability $fulfillment_availability;

    public ?ItemProcurementSchema $procurement;
}
