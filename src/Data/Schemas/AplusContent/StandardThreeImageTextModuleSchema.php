<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardThreeImageTextModuleSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $headline = null,
        public ?StandardImageTextBlockSchema $block1 = null,
        public ?StandardImageTextBlockSchema $block2 = null,
        public ?StandardImageTextBlockSchema $block3 = null,
    ) {}
}
