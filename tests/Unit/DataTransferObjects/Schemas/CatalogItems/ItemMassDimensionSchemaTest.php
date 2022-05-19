<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas\CatalogItems;

use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemMassDimensionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemMassDimensionSchema
 */
class ItemMassDimensionSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new ItemMassDimensionSchema(
            value: rand(1, 10),
            unit: 'pounds',
        );

        $this->assertInstanceOf(Mass::class, $schema->asUom());
    }
}
