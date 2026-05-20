<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContentMetadataSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
        public ?string $marketplace_id = null,
        public ?string $status = null,
        public ?array $badge_set = null,
        public ?string $update_time = null,
    ) {}
}
