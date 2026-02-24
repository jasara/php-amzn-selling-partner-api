<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class PackageItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $order_item_id,
        public ?int $quantity,
        public ?array $transparency_codes,
    ) {
    }
}
