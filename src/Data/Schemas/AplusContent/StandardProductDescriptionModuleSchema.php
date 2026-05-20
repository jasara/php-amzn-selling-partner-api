<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardProductDescriptionModuleSchema extends BaseSchema
{
    public function __construct(
        public ?ParagraphComponentSchema $body = null,
    ) {}
}
