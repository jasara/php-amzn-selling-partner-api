<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaginationSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token,
        public ?string $previous_token,
    ) {
    }
}