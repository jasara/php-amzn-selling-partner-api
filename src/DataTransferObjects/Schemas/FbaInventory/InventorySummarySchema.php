<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class InventorySummarySchema extends DataTransferObject
{
    public ?string $asin;

    public ?string $fnsku;

    public ?string $seller_sku;

    public ?string $condition;

    public ?InventoryDetailsSchema $inventory_details;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $last_updated_time;

    public ?string $product_name;

    public ?int $total_quantity;
}
