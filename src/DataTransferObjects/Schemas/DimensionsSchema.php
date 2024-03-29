<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringIsNumberValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use Spatie\DataTransferObject\DataTransferObject;

class DimensionsSchema extends DataTransferObject
{
    #[StringIsNumberValidator]
    public string $length;

    #[StringIsNumberValidator]
    public string $width;

    #[StringIsNumberValidator]
    public string $height;

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

    public function heightAsUom(): Length
    {
        return new Length($this->height, strtolower($this->unit));
    }
}
