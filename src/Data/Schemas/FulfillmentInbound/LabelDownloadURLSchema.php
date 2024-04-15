<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class LabelDownloadURLSchema extends DataTransferObject
{
    public ?string $download_url;
}
