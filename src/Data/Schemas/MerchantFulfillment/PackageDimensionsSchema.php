<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

class PackageDimensionsSchema extends BaseSchema
{
    public function __construct(
        public ?int $length,
        public ?int $width,
        public ?int $height,
        #[StringEnumValidator(['inches', 'centimeters', 'CM', 'IN'])]
        public ?string $unit,
        #[StringEnumValidator(AmazonEnums::PREDEFINED_PACKAGE_DIMENSIONS)]
        public ?string $predefined_package_dimensions,
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
