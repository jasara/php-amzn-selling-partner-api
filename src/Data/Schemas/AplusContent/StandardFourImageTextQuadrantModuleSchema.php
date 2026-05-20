<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardFourImageTextQuadrantModuleSchema extends BaseSchema
{
    public function __construct(
        public ?StandardImageTextBlockSchema $block1 = null,
        public ?StandardImageTextBlockSchema $block2 = null,
        public ?StandardImageTextBlockSchema $block3 = null,
        public ?StandardImageTextBlockSchema $block4 = null,
    ) {}
}
