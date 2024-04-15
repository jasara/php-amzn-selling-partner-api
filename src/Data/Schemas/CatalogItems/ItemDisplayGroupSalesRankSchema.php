<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemDisplayGroupSalesRankSchema extends DataTransferObject
{
    public string $website_display_group;

    public string $title;

    public ?string $link;

    public int $rank;
}
