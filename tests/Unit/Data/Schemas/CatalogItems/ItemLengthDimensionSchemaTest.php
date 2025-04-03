<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemLengthDimensionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

#[CoversNothing]
class ItemLengthDimensionSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = new ItemLengthDimensionSchema(
            value: rand(1, 10),
            unit: 'inches',
        );

        $this->assertInstanceOf(Length::class, $schema->asUom());
    }
}
