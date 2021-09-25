<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use Spatie\DataTransferObject\Exceptions\ValidationException;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema
 * @covers \Jasara\AmznSPA\DataTransferObjects\Validators\StringIsNumberValidator
 */
class AmountSchemaTest extends UnitTestCase
{
    public function testAsMoney()
    {
        $schema = new AmountSchema(
            currency_code: 'USD',
            value: 10,
        );

        $this->assertInstanceOf(Money::class, $schema->asMoney());
    }

    public function testFailsNumberValidation()
    {
        $this->expectException(ValidationException::class);

        new AmountSchema(
            currency_code: 'USD',
            value: 'abc',
        );
    }
}
