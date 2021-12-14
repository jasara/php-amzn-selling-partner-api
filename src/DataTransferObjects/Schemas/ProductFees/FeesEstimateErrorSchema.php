<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Spatie\DataTransferObject\DataTransferObject;

class FeesEstimateErrorSchema extends DataTransferObject
{
    public string $type;

    public string $code;

    public string $message;

    public array $detail;
}
