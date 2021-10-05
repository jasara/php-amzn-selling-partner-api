<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSchema extends DataTransferObject
{
    public string $asin;

    public ?string $attributes;

    #[CastWith(ArrayCaster::class, itemType: ItemIdentifiersByMarketplaceSchema::class)]
    public ?ItemIdentifiersByMarketplaceListSchema $identifiers;

    #[CastWith(ArrayCaster::class, itemType: ItemImagesByMarketplaceSchema::class)]
    public ?ItemImagesByMarketplaceListSchema $images;

    #[CastWith(ArrayCaster::class, itemType: ItemProductTypeByMarketplaceSchema::class)]
    public ?ItemProductTypeByMarketplaceListSchema $product_types;

    #[CastWith(ArrayCaster::class, itemType: ItemSalesRanksByMarketplaceSchema::class)]
    public ?ItemSalesRanksByMarketplaceListSchema $sales_ranks;

    #[CastWith(ArrayCaster::class, itemType: ItemSummaryByMarketplaceSchema::class)]
    public ?ItemSummaryByMarketplaceListSchema $summaries;

    #[CastWith(ArrayCaster::class, itemType: ItemVariationsByMarketplaceSchema::class)]
    public ?ItemVariationsByMarketplaceListSchema $variations;

    #[CastWith(ArrayCaster::class, itemType: ItemVendorDetailsByMarketplaceSchema::class)]
    public ?ItemVendorDetailsByMarketplaceListSchema $vendor_details;
}
