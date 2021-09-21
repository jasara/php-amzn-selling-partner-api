<?php

namespace Jasara\AmznSPA\DTOs\Casts;

use Jasara\AmznSPA\DTOs\Schemas\DestinationListSchema;
use Jasara\AmznSPA\DTOs\Schemas\DestinationSchema;
use Spatie\DataTransferObject\Caster;

class DestinationListSchemaPayloadCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): DestinationListSchema
    {
        return new DestinationListSchema(array_map(
            fn (array $data) => new DestinationSchema(
                name: $data['name'],
                destination_id: $data['destinationId'],
                resource: $data['resource'],
            ),
            $value
        ));
    }
}
