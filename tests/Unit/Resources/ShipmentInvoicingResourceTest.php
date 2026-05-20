<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\GetInvoiceStatusResponse;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\GetShipmentDetailsResponse;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\SubmitInvoiceResponse;
use Jasara\AmznSPA\Resources\ShipmentInvoicingResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ShipmentInvoicingResource::class)]
class ShipmentInvoicingResourceTest extends UnitTestCase
{
    public function test_get_shipment_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('shipment-invoicing/get-shipment-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipment_invoicing->getShipmentDetails(
            shipment_id: 'shipmentIdValue',
        );

        $this->assertInstanceOf(GetShipmentDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/brazil/v0/shipments/shipmentIdValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_invoice(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('shipment-invoicing/submit-invoice');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipment_invoicing->submitInvoice(
            shipment_id: 'shipmentIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitInvoiceResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/brazil/v0/shipments/shipmentIdValue/invoice', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_invoice_status(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('shipment-invoicing/get-invoice-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipment_invoicing->getInvoiceStatus(
            shipment_id: 'shipmentIdValue',
        );

        $this->assertInstanceOf(GetInvoiceStatusResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/brazil/v0/shipments/shipmentIdValue/invoice/status', urldecode($request->url()));

            return true;
        });
    }
}
