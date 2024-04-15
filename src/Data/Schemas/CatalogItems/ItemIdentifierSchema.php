<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemIdentifierSchema extends DataTransferObject
{
    public string $identifier_type;

    public string $identifier;
}
