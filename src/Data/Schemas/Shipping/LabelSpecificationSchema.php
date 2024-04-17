<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelSpecificationSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['PNG'])]
        public string $label_format,
        #[StringEnumValidator(['4x6'])]
        public string $label_stock_size,
    ) {
    }
}
