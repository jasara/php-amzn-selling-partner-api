<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class BillOfLadingDownloadURLSchema extends DataTransferObject
{
    public ?string $download_url;
}
