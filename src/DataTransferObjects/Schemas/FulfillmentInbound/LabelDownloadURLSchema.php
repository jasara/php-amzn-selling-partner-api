<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class LabelDownloadURLSchema extends DataTransferObject
{
    public ?string $download_url;
}
