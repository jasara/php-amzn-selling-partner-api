<?php

namespace Jasara\AmznSPA\Data\Responses;

use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;
use Jasara\AmznSPA\Data\Schemas\MetadataSchema;

class BaseResponse extends Data
{
    public function __construct(
        public ?ErrorListSchema $errors,
        public ?MetadataSchema $metadata,
    ) {
    }
}
