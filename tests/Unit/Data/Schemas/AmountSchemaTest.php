<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class AmountSchemaTest extends UnitTestCase
{
    public function testAsMoney()
    {
        $schema = new AmountSchema(
            currency_code: 'USD',
            value: '10.00',
        );

        $this->assertInstanceOf(Money::class, $schema->asMoney());
    }
}
