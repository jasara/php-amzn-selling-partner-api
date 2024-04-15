<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(BaseRequest::class)]
class InboundShipmentRequestTest extends UnitTestCase
{
    public function testToArrayObject()
    {
        $request = new InboundShipmentRequest(
            inbound_shipment_header: [
                'shipment_name' => Str::random(),
                'ship_from_address' => $this->setupAddress(),
                'destination_fulfillment_center_id' => Str::random(4),
                'shipment_status' => 'WORKING',
                'label_prep_preference' => 'SELLER_LABEL',
                'intended_box_contents_source' => 'FEED',
            ],
            inbound_shipment_items: [
                [
                    'seller_sku' => Str::random(),
                    'quantity_shipped' => rand(4, 12),
                    'prep_details_list' => [
                        [
                            'prep_instruction' => 'Polybagging',
                            'prep_owner' => 'SELLER',
                        ],
                    ],
                ],
            ],
            marketplace_id: 'ATVPDKIKX0DER',
        );

        $array_object = $request->toArrayObject();

        $this->assertArrayHasKey('InboundShipmentHeader', $array_object);
        $this->assertArrayHasKey('InboundShipmentItems', $array_object);
        $this->assertArrayHasKey('MarketplaceId', $array_object);

        $this->assertArrayHasKey('ShipmentName', $array_object['InboundShipmentHeader']);
        $this->assertArrayHasKey('ShipFromAddress', $array_object['InboundShipmentHeader']);

        $this->assertArrayHasKey('SellerSKU', $array_object['InboundShipmentItems'][0]);
        $this->assertArrayHasKey('QuantityShipped', $array_object['InboundShipmentItems'][0]);
    }
}
