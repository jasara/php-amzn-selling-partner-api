<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class EncryptionDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $standard = null,
        public ?string $initialization_vector = null,
        public ?string $key = null,
    ) {}
}
