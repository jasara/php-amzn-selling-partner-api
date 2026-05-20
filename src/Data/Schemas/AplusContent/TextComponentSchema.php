<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TextComponentSchema extends BaseSchema
{
    public function __construct(
        public ?string $value = null,
        public ?DecoratorSetSchema $decorator_set = null,
    ) {}
}
