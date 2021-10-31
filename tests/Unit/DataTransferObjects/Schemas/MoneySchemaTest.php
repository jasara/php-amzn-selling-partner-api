<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema
 */
class MoneySchemaTest extends UnitTestCase
{
    public function testAsMoney()
    {
        $schema = new MoneySchema(
            currency_code: 'USD',
            amount: 10,
        );

        $this->assertInstanceOf(Money::class, $schema->asMoney());
    }
}
