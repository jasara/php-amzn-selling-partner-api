<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardComparisonProductBlockSchema extends BaseSchema
{
    public function __construct(
        public ?int $position = null,
        public ?ImageComponentSchema $image = null,
        public ?string $title = null,
        public ?string $asin = null,
        public ?bool $highlight = null,
        public ?array $metrics = null,
    ) {}
}
