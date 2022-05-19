<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;

trait TestsRequests
{
    public function assertRequestSent(Factory $http, string $base_url, array $params): void
    {
        $http->assertSent(function (Request $request) use ($base_url, $params) {
            $this->assertEquals('GET', $request->method());

            $queries = [];
            foreach ($params as $key => $value) {
                $queries[] = http_build_query([
                    Str::camel($key) => is_array($value) ? implode(',', $value) : $value,
                ]);
            }

            $this->assertEquals($base_url . '?' . implode('&', $queries), $request->url());

            return true;
        });
    }
}
