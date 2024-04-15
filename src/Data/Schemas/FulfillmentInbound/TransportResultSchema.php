<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TransportResultSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::TRANSPORT_STATUSES)]
    public string $transport_status;

    public ?string $error_code;

    public ?string $error_description;
}
