<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TransportResultSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::TRANSPORT_STATUSES)]
    public string $transport_status;

    public ?string $error_code;

    public ?string $error_description;
}
