<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class PalletSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public ?WeightSchema $weight;

    public ?bool $is_stacked;
}
