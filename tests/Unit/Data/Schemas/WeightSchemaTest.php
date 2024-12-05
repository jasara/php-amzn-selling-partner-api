<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

#[CoversClass(WeightSchema::class)]
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
