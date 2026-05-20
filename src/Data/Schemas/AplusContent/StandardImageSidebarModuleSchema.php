<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardImageSidebarModuleSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $headline = null,
        public ?StandardImageCaptionBlockSchema $image_caption_block = null,
        public ?StandardTextBlockSchema $description_text_block = null,
        public ?StandardTextListBlockSchema $description_list_block = null,
        public ?StandardImageTextBlockSchema $sidebar_image_text_block = null,
        public ?StandardTextListBlockSchema $sidebar_list_block = null,
    ) {}
}
