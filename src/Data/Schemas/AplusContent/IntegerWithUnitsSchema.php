<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class IntegerWithUnitsSchema extends BaseSchema
{
    public function __construct(
        public ?int $value = null,
        public ?string $units = null,
    ) {}
}
