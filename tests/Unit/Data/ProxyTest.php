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
        $proxy = new Proxy(
            url: $proxy_url = Str::random(),
            auth_token: $proxy_auth_token = Str::random(),
        );

        $this->assertEquals($proxy_url, $proxy->url);
        $this->assertEquals($proxy_auth_token, $proxy->auth_token);
    }
}
