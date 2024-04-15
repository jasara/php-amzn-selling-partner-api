<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeedDocumentSchema extends DataTransferObject
{
    public string $feed_document_id;

    public string $url;

    #[StringEnumValidator(['GZIP'])]
    public ?string $compression_algorithm;
}
