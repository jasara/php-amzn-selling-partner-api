<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MskuPrepDetailInputSchema extends BaseSchema
{
    public function __construct(
        public string $msku,
        public PrepCategory $prep_category,
        public PrepTypeList $prep_types,
    ) {
    }
}
