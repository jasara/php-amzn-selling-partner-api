<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas\CatalogItems;

use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemLengthDimensionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemLengthDimensionSchema
 */
class ItemLengthDimensionSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new ItemLengthDimensionSchema(
            number: rand(1, 10),
            unit: 'inches',
        );

        $this->assertInstanceOf(Length::class, $schema->asUom());
    }
}
