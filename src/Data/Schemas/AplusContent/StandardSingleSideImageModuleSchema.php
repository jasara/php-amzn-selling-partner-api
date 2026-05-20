<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardSingleSideImageModuleSchema extends BaseSchema
{
    public function __construct(
        public ?string $image_position_type = null,
        public ?StandardImageTextBlockSchema $block = null,
    ) {}
}
