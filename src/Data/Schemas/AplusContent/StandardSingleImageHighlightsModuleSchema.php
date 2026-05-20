<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardSingleImageHighlightsModuleSchema extends BaseSchema
{
    public function __construct(
        public ?ImageComponentSchema $image = null,
        public ?TextComponentSchema $headline = null,
        public ?StandardTextBlockSchema $text_block1 = null,
        public ?StandardTextBlockSchema $text_block2 = null,
        public ?StandardTextBlockSchema $text_block3 = null,
        public ?StandardHeaderTextListBlockSchema $bulleted_list_block = null,
    ) {}
}
