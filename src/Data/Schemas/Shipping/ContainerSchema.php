<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\PackageDimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ContainerSchema extends DataTransferObject
{
    #[StringEnumValidator(['PACKAGE'])]
    public ?string $container_type;

    #[MaxLengthValidator(40)]
    public string $container_reference_id;

    public CurrencySchema $value;

    public PackageDimensionsSchema $dimensions;

    #[CastWith(ArrayCaster::class, itemType: ContainerItemSchema::class)]
    public ContainerItemListSchema $items;

    public WeightSchema $weight;
}
