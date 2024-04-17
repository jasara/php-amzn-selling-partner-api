<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Casts;

use Jasara\AmznSPA\Data\Base\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemIdentifierTypes;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class BackedEnumCasterTest extends UnitTestCase
{
    public function testReturnsCorrectBackedEnumFromString(): void
    {
        $caster = new BackedEnumCaster([ItemIdentifierTypes::class]);
        $result = $caster->cast('ASIN');

        $this->assertInstanceOf(ItemIdentifierTypes::class, $result);
        $this->assertEquals('ASIN', $result->value);
    }

    public function testReturnsCorrectBackedEnumFromExistingEnum(): void
    {
        $caster = new BackedEnumCaster([ItemIdentifierTypes::class]);
        $result = $caster->cast(ItemIdentifierTypes::ASIN);

        $this->assertInstanceOf(ItemIdentifierTypes::class, $result);
        $this->assertEquals('ASIN', $result->value);
    }

    public function testProvidedClassNotAnEnumException(): void
    {
        $this->expectExceptionMessage('The provided class is not an enum');

        new BackedEnumCaster(['not an enum']);
    }

    public function testCastedValueIsNotStringOrInteger(): void
    {
        $this->expectExceptionMessage('Cannot cast values that are not strings or integers to a backed Enum');

        $caster = new BackedEnumCaster([ItemIdentifierTypes::class]);
        $caster->cast([]);
    }
}
