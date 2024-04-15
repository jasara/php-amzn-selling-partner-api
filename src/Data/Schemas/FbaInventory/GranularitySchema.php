<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Spatie\DataTransferObject\DataTransferObject;

class GranularitySchema extends DataTransferObject
{
    public ?string $granularity_type;

    public ?string $granularity_id;
}
