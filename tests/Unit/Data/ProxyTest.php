<?php

namespace Jasara\AmznSPA\Tests\Unit\Data;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Proxy;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Proxy::class)]
class ProxyTest extends UnitTestCase
{
    public function testSetupTokens()
    {
        $proxy_auth_token = Str::random();
        $proxy = new Proxy(
            url: $proxy_url = Str::random(),
            headers: [
                'Authorization' => "Bearer {$proxy_auth_token}",
            ],
        );

        $this->assertEquals($proxy_url, $proxy->url);
        $this->assertEquals("Bearer {$proxy_auth_token}", $proxy->headers['Authorization']);
    }
}
