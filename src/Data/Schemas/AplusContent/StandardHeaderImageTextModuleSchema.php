<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardHeaderImageTextModuleSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $headline = null,
        public ?StandardImageTextBlockSchema $block = null,
    ) {}
}
