<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AccountSchema extends BaseSchema
{
    public function __construct(
        public MarketplaceLevelAttributesSchemaList $marketplace_level_attributes,
        public BusinessType $business_type,
        public ?BusinessSchema $business,
        public ?PrimaryContactSchema $primary_contact,
    ) {
    }
}
