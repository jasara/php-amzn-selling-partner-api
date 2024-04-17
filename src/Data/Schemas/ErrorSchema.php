<?php

namespace Jasara\AmznSPA\Data\Schemas;

class ErrorSchema extends BaseSchema
{
    public function __construct(
        public string $code,
        public string $message,
        public ?string $details,
    ) {
    }
}
