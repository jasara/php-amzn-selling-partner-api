<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeeSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::NAME)]
    public string $name;

    public AmountSchema $amount;
}
