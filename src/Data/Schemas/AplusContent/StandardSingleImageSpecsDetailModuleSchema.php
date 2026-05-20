<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardSingleImageSpecsDetailModuleSchema extends BaseSchema
{
    public function __construct(
        public ?TextComponentSchema $headline = null,
        public ?ImageComponentSchema $image = null,
        public ?TextComponentSchema $description_headline = null,
        public ?StandardTextBlockSchema $description_block1 = null,
        public ?StandardTextBlockSchema $description_block2 = null,
        public ?TextComponentSchema $specification_headline = null,
        public ?StandardHeaderTextListBlockSchema $specification_list_block = null,
        public ?StandardTextBlockSchema $specification_text_block = null,
    ) {}
}
