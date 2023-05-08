<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions;

use Spatie\DataTransferObject\DataTransferObject;

class ProductTypeSchema extends DataTransferObject
{
    public string $name;

    public array $marketplace_ids;
}
