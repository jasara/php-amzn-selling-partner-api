<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StandardComparisonTableModuleSchema extends BaseSchema
{
    public function __construct(
        public ?array $product_columns = null,
        public ?array $metric_row_labels = null,
    ) {}
}
