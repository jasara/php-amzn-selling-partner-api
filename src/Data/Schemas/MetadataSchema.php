<?php

namespace Jasara\AmznSPA\Data\Schemas;

class MetadataSchema extends BaseSchema
{
    public function __construct(
        public ?string $jasara_notes, // Developer notes to provide additional context for unusual or confusing error messages
        public ?string $amzn_request_id,
        public ?string $amzn_request_timestamp,
    ) {
    }
}
