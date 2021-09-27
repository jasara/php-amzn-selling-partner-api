<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class BillOfLadingDownloadURLSchema extends DataTransferObject
{
    public ?string $download_url;
}
