<?php

namespace Jasara\AmznSPA\DTOs\Traits;

use Jasara\AmznSPA\DTOs\Casts\ErrorCollectionCaster;
use Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

trait HasErrors
{
    #[CastWith(ErrorCollectionCaster::class)]
    public ?ErrorListSchema $error_list;
}
