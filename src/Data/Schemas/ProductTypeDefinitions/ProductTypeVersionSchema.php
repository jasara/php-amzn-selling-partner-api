<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductTypeVersionSchema extends BaseSchema
{
    public function __construct(
        public string $version,
        public bool $latest,
        public bool $release_candidate,
    ) {
    }
}
