<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Requests;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\TransportDetailInputSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(PutTransportDetailsRequest::class)]
class PutTransportDetailsRequestTest extends UnitTestCase
{
    public function testReadyDate(): void
    {
        $ready_date = CarbonImmutable::now()->addWeekdays(10);
        $request = PutTransportDetailsRequest::from(
            is_partnered: true,
            shipment_type: 'LTL',
            transport_details: TransportDetailInputSchema::from(
                partnered_ltl_data: PartneredLtlDataInputSchema::from(
                    contact: $this->setupContact(),
                    freight_ready_date: $ready_date,
                ),
            ),
        );

        $array_object = $request->toArrayObject();

        $this->assertEquals($ready_date->toDateString(), $array_object['TransportDetails']['PartneredLtlData']['FreightReadyDate']);
    }
}
