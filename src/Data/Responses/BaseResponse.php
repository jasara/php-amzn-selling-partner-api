<?php

namespace Jasara\AmznSPA\Data\Responses;

use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;
use Jasara\AmznSPA\Data\Schemas\MetadataSchema;

class BaseResponse extends Data
{
    public ?ErrorListSchema $errors = null;
    public ?MetadataSchema $metadata = null;

    public function setErrors(ErrorListSchema $errors): void
    {
        $this->errors = $errors;
    }

    public function setMetadata(MetadataSchema $metadata): void
    {
        $this->metadata = $metadata;
    }
}
