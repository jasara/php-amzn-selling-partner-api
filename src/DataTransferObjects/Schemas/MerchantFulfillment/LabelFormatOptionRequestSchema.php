<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class LabelFormatOptionRequestSchema extends DataTransferObject
{
    public ?bool $include_packing_slip_with_label;
}
