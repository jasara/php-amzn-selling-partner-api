<?php

namespace Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\Locale;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\ProductTypeVersionSchema;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\SchemaLinkSchema;

class ProductTypeDefinitionResponse extends BaseResponse
{
    public function __construct(
        public ?SchemaLinkSchema $meta_schema,
        public SchemaLinkSchema $schema,
        #[StringEnumValidator(['LISTING', 'LISTING_PRODUCT_ONLY', 'LISTING_OFFER_ONLY'])]
        public string $requirements,
        #[StringEnumValidator(['ENFORCED', 'NOT_ENFORCED'])]
        public string $requirements_enforced,
        public ProductTypeVersionSchema $product_type_version,
        public string $product_type,
        public array $marketplace_ids,
        public Locale $locale,
        public array $property_groups,
    ) {
    }
}
