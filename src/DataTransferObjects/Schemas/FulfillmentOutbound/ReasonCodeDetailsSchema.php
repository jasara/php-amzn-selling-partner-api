<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class ReasonCodeDetailsSchema extends DataTransferObject
{
    public string $return_reason_code;

    public string $description;

    public ?string $translated_description;
}
