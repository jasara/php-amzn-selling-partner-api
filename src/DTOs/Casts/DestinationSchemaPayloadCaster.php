<?php

namespace Jasara\AmznSPA\DTOs\Casts;

use Jasara\AmznSPA\DTOs\Schemas\DestinationSchema;
use Spatie\DataTransferObject\Caster;

class DestinationSchemaPayloadCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): DestinationSchema
    {
        return new DestinationSchema(
            name: $value['name'],
            destination_id: $value['destinationId'],
            resource: $value['resource'],
        );
    }
}
