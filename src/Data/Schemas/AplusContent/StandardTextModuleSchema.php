<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardTextModuleSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $headline = null,
        public ?ParagraphComponentSchema $body = null,
    ) {}
}
