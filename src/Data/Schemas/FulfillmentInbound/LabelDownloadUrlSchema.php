<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelDownloadUrlSchema extends BaseSchema
{
    public function __construct(
        public ?string $download_url,
    ) {
    }
}
