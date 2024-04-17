<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SchemaLinkSchema extends BaseSchema
{
    public function __construct(
        public LinkSchema $link,
        public string $checksum,
    ) {
    }
}
