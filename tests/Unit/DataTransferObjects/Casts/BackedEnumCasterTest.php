<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Casts;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Enums\CatalogItems\ItemIdentifierTypes;
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
