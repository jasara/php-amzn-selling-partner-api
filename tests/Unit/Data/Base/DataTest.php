<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\NonPartneredSmallParcelPackageOutputSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Data::class)]
class DataTest extends UnitTestCase
{
    public function testToArrayReturnsCasedArray(): void
    {
        $data = NonPartneredSmallParcelPackageOutputSchema::from(
            carrier_name: 'carrier_name',
            package_status: 'SHIPPED',
        );

        $this->assertEquals([
            'carrierName' => 'carrier_name',
            'packageStatus' => 'SHIPPED',
        ], $data->toArray());
    }
}
