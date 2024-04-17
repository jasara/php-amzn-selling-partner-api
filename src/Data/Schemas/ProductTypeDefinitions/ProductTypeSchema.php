<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductTypeSchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public array $marketplace_ids,
    ) {
    }
}
