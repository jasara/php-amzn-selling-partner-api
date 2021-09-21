<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Jasara\AmznSPA\DTOs\Casts\DestinationResourceSchemaCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class DestinationSchema extends DataTransferObject
{
    public string $name;

    public string $destination_id;

    #[CastWith(DestinationResourceSchemaCaster::class)]
    public DestinationResourceSchema $resource;
}
