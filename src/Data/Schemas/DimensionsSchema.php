<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringIsNumberValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

class DimensionsSchema extends BaseSchema
{
    public function __construct(
        #[StringIsNumberValidator]
        public string $length,
        #[StringIsNumberValidator]
        public string $width,
        #[StringIsNumberValidator]
        public string $height,
        #[StringEnumValidator(['inches', 'centimeters', 'CM', 'IN'])]
        public string $unit,
    ) {
    }

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
