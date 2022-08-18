<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredSmallParcelPackageOutputSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public WeightSchema $weight;

    public ?string $carrier_name;

    public ?string $tracking_id;

    #[StringEnumValidator(AmazonEnums::PACKAGE_STATUSES)]
    public string $package_status;
}
