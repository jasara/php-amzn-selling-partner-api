<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSalesRankSchema extends BaseSchema
{
    public function __construct(
        public string $title,
        public ?string $link,
        public int $rank,
    ) {
    }
}
