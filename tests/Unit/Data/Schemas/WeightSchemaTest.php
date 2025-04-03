<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

#[CoversNothing]
class WeightSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new WeightSchema(
            value: (string) rand(1, 10),
            unit: 'pounds',
        );

        $this->assertInstanceOf(Mass::class, $schema->asMass());
    }
}
