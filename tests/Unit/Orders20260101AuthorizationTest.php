<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPAHttp;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestWith;

#[CoversClass(AmznSPAHttp::class)]
final class Orders20260101AuthorizationTest extends UnitTestCase
{
    #[TestWith(['/orders/2026-01-01/orders', 'orders/v20260101/search-orders'])]
    #[TestWith(['/orders/2026-01-01/orders/123-4567890-1234567', 'orders/v20260101/get-order'])]
    public function testNewOrdersEndpointsUseLwaTokenWhenRestrictedDataIsEnabled(string $path, string $stub): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp($stub);
        $config->setMarketplace('ATVPDKIKX0DER');
        $client = new AmznSPAHttp($config);
        $client->setRestrictedDataElements(['buyerInfo', 'shippingAddress']);

        $response = $client->get('https://sellingpartnerapi-na.amazon.com' . $path);

        $this->assertIsArray($response);
        $http->assertSent(fn (Request $request): bool => $request->method() === 'GET'
            && $request->url() === 'https://sellingpartnerapi-na.amazon.com' . $path
            && $request->header('x-amz-access-token') === [$config->getTokens()->access_token]);
        $http->assertSentCount(1);
    }
}
