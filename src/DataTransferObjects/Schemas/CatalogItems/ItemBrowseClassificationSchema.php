<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemBrowseClassificationSchema extends DataTransferObject
{
    public string $display_name;

    public string $classification_id;
}
