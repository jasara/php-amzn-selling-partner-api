<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringIsNumberValidator;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Spatie\DataTransferObject\Exceptions\ValidationException;

#[CoversClass(AmountSchema::class)]
#[CoversClass(StringIsNumberValidator::class)]
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
