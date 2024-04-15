<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Spatie\DataTransferObject\DataTransferObject;

class SchemaLinkSchema extends DataTransferObject
{
    public LinkSchema $link;
    public string $checksum;
}
