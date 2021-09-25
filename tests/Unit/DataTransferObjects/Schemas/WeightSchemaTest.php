<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema
 */
class WeightSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new WeightSchema(
            value: rand(1, 10),
            unit: 'pounds',
        );

        $this->assertInstanceOf(Mass::class, $schema->asMass());
    }
}
