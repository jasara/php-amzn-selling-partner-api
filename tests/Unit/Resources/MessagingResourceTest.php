<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Messaging\ConfirmCustomizationDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmDeliveryDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmOrderDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmServiceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateDigitalAccessKeyResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateLegalDisclosureResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateUnexpectedProblemResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateWarrantyResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\GetAttributesResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\GetMessagingActionsForOrderResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\SendInvoiceResponse;
use Jasara\AmznSPA\Resources\MessagingResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MessagingResource::class)]
class MessagingResourceTest extends UnitTestCase
{
    public function test_get_messaging_actions_for_order(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/get-messaging-actions-for-order');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->getMessagingActionsForOrder(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
        );

        $this->assertInstanceOf(GetMessagingActionsForOrderResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function test_confirm_customization_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/confirm-customization-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->confirmCustomizationDetails(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(ConfirmCustomizationDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/confirmCustomizationDetails?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_confirm_delivery_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-confirm-delivery-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createConfirmDeliveryDetails(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateConfirmDeliveryDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/confirmDeliveryDetails?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_legal_disclosure(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-legal-disclosure');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createLegalDisclosure(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateLegalDisclosureResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/legalDisclosure?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_confirm_order_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-confirm-order-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createConfirmOrderDetails(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateConfirmOrderDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/confirmOrderDetails?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_confirm_service_details(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-confirm-service-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createConfirmServiceDetails(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateConfirmServiceDetailsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/confirmServiceDetails?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_warranty(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-warranty');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createWarranty(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateWarrantyResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/warranty?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_attributes(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/get-attributes');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->getAttributes(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
        );

        $this->assertInstanceOf(GetAttributesResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/attributes?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_digital_access_key(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-digital-access-key');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createDigitalAccessKey(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateDigitalAccessKeyResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/digitalAccessKey?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_unexpected_problem(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/create-unexpected-problem');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->createUnexpectedProblem(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateUnexpectedProblemResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/unexpectedProblem?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_send_invoice(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('messaging/send-invoice');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->messaging->sendInvoice(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SendInvoiceResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/messaging/v1/orders/amazonOrderIdValue/messages/invoice?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
