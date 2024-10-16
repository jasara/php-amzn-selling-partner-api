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
        $proxy_url = Str::random();
        $proxy_auth_token = Str::random();
        $proxy = new Proxy(
            url: $proxy_url,
            auth_token: $proxy_auth_token
        );

        $this->assertEquals($proxy_url, $proxy->url);
        $this->assertEquals($proxy_auth_token, $proxy->auth_token);
    }
}
