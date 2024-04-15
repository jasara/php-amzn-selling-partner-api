<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Spatie\DataTransferObject\DataTransferObject;

class ProductTypeSchema extends DataTransferObject
{
    public string $name;

    public array $marketplace_ids;
}
