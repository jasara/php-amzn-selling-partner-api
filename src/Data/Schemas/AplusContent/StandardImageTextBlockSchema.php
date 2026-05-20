<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardImageTextBlockSchema extends BaseSchema
{
    public function __construct(
        public ?ImageComponentSchema $image = null,
        public ?TextComponentSchema $headline = null,
        public ?ParagraphComponentSchema $body = null,
    ) {}
}
