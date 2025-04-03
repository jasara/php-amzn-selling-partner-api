<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemMassDimensionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

#[CoversNothing]
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
