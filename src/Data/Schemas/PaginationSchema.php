<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class PaginationSchema extends DataTransferObject
{
    public ?string $next_token;

    public ?string $previous_token;
}
