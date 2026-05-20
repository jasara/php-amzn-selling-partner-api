<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardTextListBlockSchema extends BaseSchema
{
    public function __construct(
        public ?array $text_list = null,
    ) {}
}
