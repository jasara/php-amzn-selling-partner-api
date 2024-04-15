<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Spatie\DataTransferObject\DataTransferObject;

class LabelResultSchema extends DataTransferObject
{
    public ?string $container_reference_id;

    public ?string $tracking_id;

    public ?LabelSchema $label;
}
