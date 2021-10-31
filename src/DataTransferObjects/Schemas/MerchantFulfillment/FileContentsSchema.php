<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FileContentsSchema extends DataTransferObject
{
    public string $contents;

    #[StringEnumValidator(['application/pdf', 'application/zpl', 'image/png'])]
    public string $file_type;

    public string $checksum;
}
