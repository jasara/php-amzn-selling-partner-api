<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use Spatie\DataTransferObject\DataTransferObject;

class DimensionsSchema extends DataTransferObject
{
    public int $length;

    public int $width;

    #[StringEnumValidator(['inches', 'centimeters', 'CM', 'IN'])]
    public string $unit;

    public function lengthAsUom(): Length
    {
        return new Length($this->length, strtolower($this->unit));
    }

    public function widthAsUom(): Length
    {
        return new Length($this->width, strtolower($this->unit));
    }
}
