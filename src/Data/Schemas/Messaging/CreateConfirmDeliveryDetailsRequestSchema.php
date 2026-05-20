<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateConfirmDeliveryDetailsRequestSchema extends BaseSchema
{
    public function __construct(
        public ?string $text = null,
    ) {}
}
