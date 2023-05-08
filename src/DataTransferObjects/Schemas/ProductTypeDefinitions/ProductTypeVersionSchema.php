<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions;

use Spatie\DataTransferObject\DataTransferObject;

class ProductTypeVersionSchema extends DataTransferObject
{
    public string $version;
    public bool $latest;
    public bool $release_candidate;
}
