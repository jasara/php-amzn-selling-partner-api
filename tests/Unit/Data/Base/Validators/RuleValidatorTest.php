<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Validators;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ContactInformationSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RuleValidator::class)]
class RuleValidatorTest extends UnitTestCase
{
    public function testMaxLengthError(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('The value field must not be greater than 50 characters');

        AddressSchema::from([
            'name' => Str::random(60),
            'address_line_1' => Str::random(),
            'address_line_2' => null,
            'district_or_county' => Str::random(),
            'city' => Str::random(),
            'state_or_province_code' => Str::random(),
            'country_code' => Str::random(2),
            'postal_code' => Str::random(),
        ]);
    }

    public function testDoesntFailWithNullValue(): void
    {
        $schema = ContactInformationSchema::from();

        $this->assertInstanceof(ContactInformationSchema::class, $schema);
        $this->assertNull($schema->email);
    }
}
