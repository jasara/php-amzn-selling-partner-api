<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\PackageDimensionsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
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

    #[CastWith(ArrayCaster::class, itemType: ContainerItem::class)]
    public ContainerItemSchema $items;

    public WeightSchema $weight;
}
