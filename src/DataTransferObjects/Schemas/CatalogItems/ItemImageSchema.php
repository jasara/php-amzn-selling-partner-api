<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemImageSchema extends DataTransferObject
{
    public string $variant;

    public string $link;

    public int $height;

    public int $width;
}
