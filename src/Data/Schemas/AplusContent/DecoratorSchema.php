<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DecoratorSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?int $offset = null,
        public ?int $length = null,
        public ?int $depth = null,
    ) {}
}
