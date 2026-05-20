<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardTextPairBlockSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $label = null,
        public ?TextComponentSchema $description = null,
    ) {}
}
