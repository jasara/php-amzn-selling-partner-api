<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemClassificationSalesRankSchema extends DataTransferObject
{
    public string $classification_id;

    public string $title;

    public ?string $link;

    public int $rank;
}
