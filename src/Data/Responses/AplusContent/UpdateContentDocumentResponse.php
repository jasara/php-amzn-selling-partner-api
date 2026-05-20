<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\AplusContent;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\AplusContent\MessageSetSchema;

class UpdateContentDocumentResponse extends BaseResponse
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?string $content_reference_key = null,
    ) {}

}
