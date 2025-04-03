<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\PackageDimensionsSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

#[CoversNothing]
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
