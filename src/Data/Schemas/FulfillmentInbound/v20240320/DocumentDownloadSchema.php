<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DocumentDownloadSchema extends BaseSchema
{
    public function __construct(
        public DocumentDownloadType $download_type,
        public ?CarbonImmutable $expiration,
        public string $uri,
    ) {
    }
}
