<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelPackageOutputSchema extends DataTransferObject
{
    public ?string $carrier_name;

    public ?string $tracking_id;

    #[StringEnumValidator(AmazonEnums::PACKAGE_STATUSES)]
    public string $package_status;
}
