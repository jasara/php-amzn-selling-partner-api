<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MskuPrepDetailSchema extends BaseSchema
{
    public function __construct(
        public ?AllOwnersConstraint $all_owners_constraint,
        public ?OwnerConstraint $label_owner_constraint,
        public string $msku,
        public PrepCategory $prep_category,
        public PrepTypeList $prep_types,
        public ?OwnerConstraint $prep_owner_constraint,
    ) {
    }
}
