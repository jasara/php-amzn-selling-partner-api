<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributePropertySchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AttributesListSchema::class)]
class AttributesListSchemaTest extends UnitTestCase
{
    public function testReturnsArrayObject(): void
    {
        $attributes_list = new AttributesListSchema([
            new AttributeSchema(
                name: 'bullet_point',
                properties: [
                    new AttributePropertySchema(
                        name: 'value',
                        value: 'test',
                    ),
                    new AttributePropertySchema(
                        name: 'nested',
                        properties: [
                            new AttributePropertySchema(
                                name: 'marketplace_id',
                                value: 'ATVPDKIKX0DER',
                            ),
                        ]
                    ),
                ],
            ),
        ]);

        $this->assertInstanceOf(\ArrayObject::class, $attributes_list->toArrayObject());
    }
}
