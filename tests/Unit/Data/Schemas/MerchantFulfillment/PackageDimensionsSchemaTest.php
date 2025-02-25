<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\PackageDimensionsSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

#[CoversClass(PackageDimensionsSchema::class)]
class PackageDimensionsSchemaTest extends UnitTestCase
{
    public function testAsUom()
    {
        $schema = PackageDimensionsSchema::from(
            length: (string) rand(1, 10),
            width: (string) rand(1, 10),
            height: (string) rand(1, 10),
            unit: 'inches',
        );

        $this->assertInstanceOf(Length::class, $schema->lengthAsUom());
        $this->assertInstanceOf(Length::class, $schema->widthAsUom());
        $this->assertInstanceOf(Length::class, $schema->heightAsUom());
    }
}
