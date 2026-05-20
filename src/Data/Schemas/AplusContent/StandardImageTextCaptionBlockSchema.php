<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardImageTextCaptionBlockSchema extends BaseSchema
{
    public function __construct(
        public ?StandardImageTextBlockSchema $block = null,
        public ?TextComponentSchema $caption = null,
    ) {}
}
