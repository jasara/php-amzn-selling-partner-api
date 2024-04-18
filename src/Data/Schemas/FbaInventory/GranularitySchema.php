<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GranularitySchema extends BaseSchema
{
    public function __construct(
        public ?string $granularity_type,
        public ?string $granularity_id,
    ) {
    }
}
