<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Schemas\CatalogItems;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSchema extends DataTransferObject
{
    public string $asin;

    public ?array $attributes;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemIdentifiersByMarketplaceSchema::class)]
    public ?CatalogItems\ItemIdentifiersByMarketplaceListSchema $identifiers;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemImagesByMarketplaceSchema::class)]
    public ?CatalogItems\ItemImagesByMarketplaceListSchema $images;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemProductTypeByMarketplaceSchema::class)]
    public ?CatalogItems\ItemProductTypeByMarketplaceListSchema $product_types;

    #[CastWith(ArrayCaster::class, itemType: ItemSalesRanksByMarketplaceSchema::class)]
    public ?ItemSalesRanksByMarketplaceListSchema $sales_ranks;

    #[CastWith(ArrayCaster::class, itemType: ItemSummaryByMarketplaceSchema::class)]
    public ?ItemSummaryByMarketplaceListSchema $summaries;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemVariationsByMarketplaceSchema::class)]
    public ?CatalogItems\ItemVariationsByMarketplaceListSchema $variations;

    #[CastWith(ArrayCaster::class, itemType: ItemVendorDetailsByMarketplaceSchema::class)]
    public ?ItemVendorDetailsByMarketplaceListSchema $vendor_details;
}
