<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\NonPartneredSmallParcelDataOutputSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Data::class)]
class DataTest extends UnitTestCase
{
    public function testToArrayReturnsArray(): void
    {
        $data = NonPartneredSmallParcelDataOutputSchema::from([
            'package_list' => [
                [
                    'carrier_name' => 'carrier_name2',
                    'package_status' => 'IN_TRANSIT',
                ],
            ],
        ]);

        $this->assertEquals([
            'package_list' => [
                [
                    'carrier_name' => 'carrier_name2',
                    'package_status' => 'IN_TRANSIT',
                    'tracking_id' => null,
                ],
            ],
        ], $data->toArray());
    }
}
