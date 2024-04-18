<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\PackageDimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class ContainerSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['PACKAGE'])]
        public ?string $container_type,
        #[MaxLengthValidator(40)]
        public string $container_reference_id,
        public CurrencySchema $value,
        public PackageDimensionsSchema $dimensions,

        public ContainerItemListSchema $items,
        public WeightSchema $weight,
    ) {
    }
}
