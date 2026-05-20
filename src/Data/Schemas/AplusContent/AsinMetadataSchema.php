<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AsinMetadataSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin = null,
        public ?array $badge_set = null,
        public ?string $parent = null,
        public ?string $title = null,
        public ?string $image_url = null,
        public ?array $content_reference_key_set = null,
    ) {}
}
