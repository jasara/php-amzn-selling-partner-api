<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetContentDocumentResponseSchema extends BaseSchema
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?ContentRecordSchema $content_record = null,
    ) {}
}
