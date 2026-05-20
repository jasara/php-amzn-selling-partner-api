<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Data\Responses\VendorInvoices\SubmitInvoicesResponse;
use Jasara\AmznSPA\Resources\VendorInvoicesResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorInvoicesResource::class)]
class VendorInvoicesResourceTest extends UnitTestCase
{
    public function test_submit_invoices(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-invoices/submit-invoices');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorInvoices();
        $response = $resource->submitInvoices(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitInvoicesResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/payments/v1/invoices', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
