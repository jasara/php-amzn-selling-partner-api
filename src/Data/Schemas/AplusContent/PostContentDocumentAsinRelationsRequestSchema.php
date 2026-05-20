<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PostContentDocumentAsinRelationsRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $asin_set = null,
    ) {}
}
