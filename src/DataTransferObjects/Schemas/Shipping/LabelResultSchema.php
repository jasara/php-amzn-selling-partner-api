<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Spatie\DataTransferObject\DataTransferObject;

class LabelResultSchema extends DataTransferObject
{
    public ?string $container_reference_id;

    public ?string $tracking_id;

    public ?LabelSchema $label;
}
