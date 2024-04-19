<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportResultSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::TRANSPORT_STATUSES)]
        public string $transport_status,
        public ?string $error_code,
        public ?string $error_description,
    ) {
    }
}
