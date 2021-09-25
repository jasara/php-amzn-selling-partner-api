<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema
 */
class DimensionsSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new DimensionsSchema(
            length: rand(1, 10),
            width: rand(1, 10),
            height: rand(1, 10),
            unit: 'inches',
        );

        $this->assertInstanceOf(Length::class, $schema->lengthAsUom());
        $this->assertInstanceOf(Length::class, $schema->widthAsUom());
        $this->assertInstanceOf(Length::class, $schema->heightAsUom());
    }
}
