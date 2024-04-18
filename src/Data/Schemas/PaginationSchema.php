<?php

namespace Jasara\AmznSPA\Data\Schemas;

class PaginationSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token,
        public ?string $previous_token,
    ) {
    }
}
