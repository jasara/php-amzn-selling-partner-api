<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class SalesChannelSchema extends BaseSchema
{
    public function __construct(
        public string $channel_name,
        public ?string $marketplace_id,
        public ?string $marketplace_name,
    ) {
    }
}
