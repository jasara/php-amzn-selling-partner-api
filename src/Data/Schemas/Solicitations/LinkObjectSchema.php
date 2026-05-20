<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Solicitations;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LinkObjectSchema extends BaseSchema
{
    public function __construct(
        public ?string $href = null,
        public ?string $name = null,
    ) {}
}
