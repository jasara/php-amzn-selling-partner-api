<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardImageTextOverlayModuleSchema extends BaseSchema
{
    public function __construct(
        public ?string $overlay_color_type = null,
        public ?StandardImageTextBlockSchema $block = null,
    ) {}
}
