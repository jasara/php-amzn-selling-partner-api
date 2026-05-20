<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PlainTextItemSchema extends BaseSchema
{
    public function __construct(
        public ?int $position = null,
        public ?string $value = null,
    ) {}
}
