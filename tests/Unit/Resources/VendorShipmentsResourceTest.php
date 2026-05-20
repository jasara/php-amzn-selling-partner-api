<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorShipments\GetShipmentDetailsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\GetShipmentLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\SubmitShipmentConfirmationsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\SubmitShipmentsResponse;
use Jasara\AmznSPA\Resources\VendorShipmentsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorShipmentsResource::class)]
class VendorShipmentsResourceTest extends UnitTestCase
{
    public function test_submit_shipment_confirmations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-shipments/submit-shipment-confirmations');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_shipments->submitShipmentConfirmations(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitShipmentConfirmationsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/shipping/v1/shipmentConfirmations', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_shipment_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-shipments/get-shipment-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_shipments->getShipmentDetails(
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            shipment_confirmed_before: 'shipmentConfirmedBeforeValue',
            shipment_confirmed_after: 'shipmentConfirmedAfterValue',
            package_label_created_before: 'packageLabelCreatedBeforeValue',
            package_label_created_after: 'packageLabelCreatedAfterValue',
            shipped_before: 'shippedBeforeValue',
            shipped_after: 'shippedAfterValue',
            estimated_delivery_before: 'estimatedDeliveryBeforeValue',
            estimated_delivery_after: 'estimatedDeliveryAfterValue',
            shipment_delivery_before: 'shipmentDeliveryBeforeValue',
            shipment_delivery_after: 'shipmentDeliveryAfterValue',
            requested_pick_up_before: 'requestedPickUpBeforeValue',
            requested_pick_up_after: 'requestedPickUpAfterValue',
            scheduled_pick_up_before: 'scheduledPickUpBeforeValue',
            scheduled_pick_up_after: 'scheduledPickUpAfterValue',
            current_shipment_status: 'currentShipmentStatusValue',
            vendor_shipment_identifier: 'vendorShipmentIdentifierValue',
            buyer_reference_number: 'buyerReferenceNumberValue',
            buyer_warehouse_code: 'buyerWarehouseCodeValue',
            seller_warehouse_code: 'sellerWarehouseCodeValue',
        );

        $this->assertInstanceOf(GetShipmentDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/shipping/v1/shipments?limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue&createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipmentConfirmedBefore=shipmentConfirmedBeforeValue&shipmentConfirmedAfter=shipmentConfirmedAfterValue&packageLabelCreatedBefore=packageLabelCreatedBeforeValue&packageLabelCreatedAfter=packageLabelCreatedAfterValue&shippedBefore=shippedBeforeValue&shippedAfter=shippedAfterValue&estimatedDeliveryBefore=estimatedDeliveryBeforeValue&estimatedDeliveryAfter=estimatedDeliveryAfterValue&shipmentDeliveryBefore=shipmentDeliveryBeforeValue&shipmentDeliveryAfter=shipmentDeliveryAfterValue&requestedPickUpBefore=requestedPickUpBeforeValue&requestedPickUpAfter=requestedPickUpAfterValue&scheduledPickUpBefore=scheduledPickUpBeforeValue&scheduledPickUpAfter=scheduledPickUpAfterValue&currentShipmentStatus=currentShipmentStatusValue&vendorShipmentIdentifier=vendorShipmentIdentifierValue&buyerReferenceNumber=buyerReferenceNumberValue&buyerWarehouseCode=buyerWarehouseCodeValue&sellerWarehouseCode=sellerWarehouseCodeValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_shipments(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-shipments/submit-shipments');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_shipments->submitShipments(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitShipmentsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/shipping/v1/shipments', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_shipment_labels(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-shipments/get-shipment-labels');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_shipments->getShipmentLabels(
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
            label_created_after: 'labelCreatedAfterValue',
            label_created_before: 'labelCreatedBeforeValue',
            buyer_reference_number: 'buyerReferenceNumberValue',
            vendor_shipment_identifier: 'vendorShipmentIdentifierValue',
            seller_warehouse_code: 'sellerWarehouseCodeValue',
        );

        $this->assertInstanceOf(GetShipmentLabelsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/shipping/v1/transportLabels?limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue&labelCreatedAfter=labelCreatedAfterValue&labelCreatedBefore=labelCreatedBeforeValue&buyerReferenceNumber=buyerReferenceNumberValue&vendorShipmentIdentifier=vendorShipmentIdentifierValue&sellerWarehouseCode=sellerWarehouseCodeValue', urldecode($request->url()));

            return true;
        });
    }
}
