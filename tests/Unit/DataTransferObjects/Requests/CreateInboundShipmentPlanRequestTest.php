<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Requests;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Spatie\DataTransferObject\Exceptions\ValidationException;

#[CoversClass(CreateInboundShipmentPlanRequest::class)]
#[CoversClass(MaxLengthValidator::class)]
class CreateInboundShipmentPlanRequestTest extends UnitTestCase
{
    public function testSetupDtoMaxLengthError()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The length of the string');

        new CreateInboundShipmentPlanRequest(
            ship_from_address: [
                'name' => Str::random(60),
                'address_line_1' => Str::random(),
                'address_line_2' => null,
                'district_or_county' => Str::random(),
                'city' => Str::random(),
                'state_or_province_code' => Str::random(),
                'country_code' => Str::random(2),
                'postal_code' => Str::random(),
            ],
            label_prep_preference: 'SELLER_LABEL',
        );
    }
}
