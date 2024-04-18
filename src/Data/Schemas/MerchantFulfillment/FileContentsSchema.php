<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FileContentsSchema extends BaseSchema
{
    public function __construct(
        public string $contents,
        #[StringEnumValidator(['application/pdf', 'application/zpl', 'image/png'])]
        public string $file_type,
        public string $checksum,
    ) {
    }
}
