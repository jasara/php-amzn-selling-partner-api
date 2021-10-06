<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Spatie\DataTransferObject\DataTransferObject;

class GranularitySchema extends DataTransferObject
{
    public ?string $granularity_type;

    public ?string $granularity_id;
}
