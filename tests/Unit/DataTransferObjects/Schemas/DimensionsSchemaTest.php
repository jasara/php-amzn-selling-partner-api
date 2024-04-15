<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

#[CoversClass(DimensionsSchema::class)]
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
