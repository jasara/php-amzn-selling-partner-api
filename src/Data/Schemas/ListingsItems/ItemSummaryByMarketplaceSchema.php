<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemImageSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class ItemSummaryByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $asin,
        public string $product_type,
        #[StringEnumValidator(AmazonEnums::CONDITION_TYPE)]
        public ?string $condition_type,
        public array $status,
        public ?string $fnsku,
        public string $item_name,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $created_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $last_updated_date,
        public ?ItemImageSchema $main_image,
    ) {
    }
}
