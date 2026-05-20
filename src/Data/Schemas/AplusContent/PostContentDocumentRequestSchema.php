<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PostContentDocumentRequestSchema extends BaseSchema
{
    public function __construct(
        public ?ContentDocumentSchema $content_document = null,
    ) {}
}
