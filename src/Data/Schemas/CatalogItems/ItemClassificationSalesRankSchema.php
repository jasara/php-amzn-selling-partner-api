<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemClassificationSalesRankSchema extends BaseSchema
{
    public function __construct(
        public string $classification_id,
        public string $title,
        public ?string $link,
        public int $rank,
    ) {
    }
}
