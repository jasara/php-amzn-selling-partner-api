<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class MetadataSchema extends DataTransferObject
{
    // Developer notes to provide additional context for unusual or
    // confusing error messages
    public ?string $jasara_notes;

    public ?string $amzn_request_id;

    public ?string $amzn_request_timestamp;
}
