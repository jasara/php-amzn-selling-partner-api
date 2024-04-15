<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class PalletSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public ?WeightSchema $weight;

    public ?bool $is_stacked;
}
