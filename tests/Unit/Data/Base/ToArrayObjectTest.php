<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Jasara\AmznSPA\Data\Base\ToArrayObject;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ToArrayObject::class)]
class ToArrayObjectTest extends UnitTestCase
{
    public function testReturnsDataUsingMappers(): void
    {
        $data = PartneredLtlDataInputSchema::from([
            'freight_ready_date' => '2021-01-01',
        ]);

        $array_object = $data->toArrayObject();

        $this->assertEquals('2021-01-01', $array_object['freightReadyDate']);
    }
}
