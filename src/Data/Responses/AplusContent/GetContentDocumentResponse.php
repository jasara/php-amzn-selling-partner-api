<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\AplusContent;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\AplusContent\ContentRecordSchema;
use Jasara\AmznSPA\Data\Schemas\AplusContent\MessageSetSchema;

class GetContentDocumentResponse extends BaseResponse
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?ContentRecordSchema $content_record = null,
    ) {}

}
