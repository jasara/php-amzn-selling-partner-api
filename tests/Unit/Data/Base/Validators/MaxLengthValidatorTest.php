<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Validators;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MaxLengthValidator::class)]
class MaxLengthValidatorTest extends UnitTestCase
{
    public function testSetupDtoMaxLengthError(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('The length of the string');

        AddressSchema::from([
            'name' => Str::random(10),
            'address_line_1' => Str::random(),
            'address_line_2' => null,
            'district_or_county' => Str::random(),
            'city' => Str::random(),
            'state_or_province_code' => Str::random(),
            'country_code' => Str::random(2),
            'postal_code' => Str::random(50),
        ]);
    }
}
