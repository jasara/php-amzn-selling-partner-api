<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductTypeDefinitions;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions\ProductTypeVersionSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions\SchemaLinkSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Jasara\AmznSPA\Enums\ProductTypeDefinitions\Locale;
use Spatie\DataTransferObject\Attributes\CastWith;

class ProductTypeDefinitionResponse extends BaseResponse
{
    public ?SchemaLinkSchema $meta_schema;
    public SchemaLinkSchema $schema;

    #[StringEnumValidator(['LISTING', 'LISTING_PRODUCT_ONLY', 'LISTING_OFFER_ONLY'])]
    public string $requirements;

    #[StringEnumValidator(['ENFORCED', 'NOT_ENFORCED'])]
    public string $requirements_enforced;
    public ProductTypeVersionSchema $product_type_version;
    public string $product_type;
    public array $marketplace_ids;

    #[CastWith(BackedEnumCaster::class)]
    public Locale $locale;
    public array $property_groups;
}
