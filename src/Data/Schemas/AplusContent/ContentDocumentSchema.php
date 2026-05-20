<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContentDocumentSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
        public ?string $content_type = null,
        public ?string $content_sub_type = null,
        public ?string $locale = null,
        public ?ContentModuleListSchema $content_module_list = null,
    ) {}
}
