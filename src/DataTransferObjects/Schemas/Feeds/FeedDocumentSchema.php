<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeedDocumentSchema extends DataTransferObject
{
    public string $feed_document_id;

    public string $url;

    #[StringEnumValidator(['GZIP'])]
    public ?string $compression_algorithm;
}
