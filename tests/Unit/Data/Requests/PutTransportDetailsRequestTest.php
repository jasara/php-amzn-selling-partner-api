<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Requests;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\TransportDetailInputSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class PutTransportDetailsRequestTest extends UnitTestCase
{
    public function testReadyDate()
    {
        $ready_date = CarbonImmutable::now()->addWeekdays(10);
        $request = new PutTransportDetailsRequest(
            is_partnered: true,
            shipment_type: 'LTL',
            transport_details: new TransportDetailInputSchema(
                partnered_ltl_data: new PartneredLtlDataInputSchema(
                    contact: $this->setupContact(),
                    freight_ready_date: $ready_date,
                ),
            ),
        );

        $array_object = $request->toArrayObject();

        $this->assertEquals($ready_date->toDateString(), $array_object['TransportDetails']['PartneredLtlData']['FreightReadyDate']);
    }
}
