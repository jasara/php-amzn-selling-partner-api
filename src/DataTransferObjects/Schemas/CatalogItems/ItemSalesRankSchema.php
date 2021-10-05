<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemSalesRankSchema extends DataTransferObject
{
    public string $title;

    public ?string $link;

    public int $rank;
}
