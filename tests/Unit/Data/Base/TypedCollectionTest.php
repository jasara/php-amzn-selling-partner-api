<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Jasara\AmznSPA\Data\Base\TypedCollection;
use Jasara\AmznSPA\Data\Schemas\Tokens\RestrictedResourceSchema;
use Jasara\AmznSPA\Data\Schemas\Tokens\RestrictedResourcesListSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TypedCollection::class)]
class TypedCollectionTest extends UnitTestCase
{
    public function testNewTypedCollection(): void
    {
        $collection = new RestrictedResourcesListSchema(
            new RestrictedResourceSchema(method: 'GET', path: '/path', data_elements: null),
        );

        $this->assertInstanceOf(RestrictedResourcesListSchema::class, $collection);
        $this->assertCount(1, $collection);
        $this->assertInstanceOf(RestrictedResourceSchema::class, $collection[0]);
    }

    public function testMakeTypedCollection(): void
    {
        $collection = RestrictedResourcesListSchema::make([
            new RestrictedResourceSchema(method: 'GET', path: '/path', data_elements: null),
        ]);

        $this->assertInstanceOf(RestrictedResourcesListSchema::class, $collection);
        $this->assertCount(1, $collection);
        $this->assertInstanceOf(RestrictedResourceSchema::class, $collection[0]);
    }

    public function testEnsureFailsWithNewTypedCollection(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        new RestrictedResourcesListSchema(
            new RestrictedResourceSchema(method: 'GET', path: '/path', data_elements: null),
            new \stdClass(),
        );
    }

    public function testEnsureFailsWithMakeTypedCollection(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        RestrictedResourcesListSchema::make([
            new RestrictedResourceSchema(method: 'GET', path: '/path', data_elements: null),
            new \stdClass(),
        ]);
    }
}
