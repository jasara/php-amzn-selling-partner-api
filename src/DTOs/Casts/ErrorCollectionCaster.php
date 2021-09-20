<?php

namespace Jasara\AmznSPA\DTOs\Casts;

use Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DTOs\Schemas\ErrorSchema;
use Spatie\DataTransferObject\Caster;

class ErrorCollectionCaster implements Caster
{
    public function cast(mixed $value): ErrorListSchema
    {
        return new ErrorListSchema(array_map(
            fn (array $data) => new ErrorSchema(...$data),
            $value
        ));
    }
}
