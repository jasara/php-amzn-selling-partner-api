<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ItemPackingSchema extends BaseSchema
{
    public function __construct(
        public ?GiftOptionSchema $gift_option,
    ) {
    }
}
