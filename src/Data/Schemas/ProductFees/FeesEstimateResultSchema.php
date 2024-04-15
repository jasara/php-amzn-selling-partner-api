<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Spatie\DataTransferObject\DataTransferObject;

class FeesEstimateResultSchema extends DataTransferObject
{
    public ?string $status;

    public ?FeesEstimateIdentifierSchema $fees_estimat_identifier;

    public ?FeesEstimateSchema $fees_estimate;

    public ?FeesEstimateErrorSchema $error;
}
