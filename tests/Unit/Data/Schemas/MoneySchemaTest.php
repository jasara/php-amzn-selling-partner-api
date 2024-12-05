<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MoneySchema::class)]
class MoneySchemaTest extends UnitTestCase
{
    public function testAsMoney()
    {
        $schema = new MoneySchema(
            currency_code: 'USD',
            amount: '10.00',
        );

        $this->assertInstanceOf(Money::class, $schema->asMoney());
    }
}
