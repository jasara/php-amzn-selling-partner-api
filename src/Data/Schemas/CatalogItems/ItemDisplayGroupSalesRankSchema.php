<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDisplayGroupSalesRankSchema extends BaseSchema
{
    public function __construct(
        public string $website_display_group,
        public string $title,
        public ?string $link,
        public int $rank,
    ) {
    }
}
