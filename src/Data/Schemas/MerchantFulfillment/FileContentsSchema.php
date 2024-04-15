<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FileContentsSchema extends DataTransferObject
{
    public string $contents;

    #[StringEnumValidator(['application/pdf', 'application/zpl', 'image/png'])]
    public string $file_type;

    public string $checksum;
}
