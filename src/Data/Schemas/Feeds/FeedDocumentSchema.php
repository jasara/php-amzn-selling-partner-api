<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeedDocumentSchema extends BaseSchema
{
    public function __construct(
        public string $feed_document_id,
        public string $url,
        #[StringEnumValidator(['GZIP'])]
        public ?string $compression_algorithm,
    ) {
    }
}
