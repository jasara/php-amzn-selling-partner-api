<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema
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
}
