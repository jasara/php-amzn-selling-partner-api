<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Http\Client\Factory;

trait SetupFakeHttp
{
    public function fakeHttpStub(string $stub, int $status_code = 200): Factory
    {
        $stub_filepath = __DIR__ . '/../stubs/' . $stub . '.json';

        $http = new Factory;
        $http->fake([
            '*' => $http->response(json_decode(file_get_contents($stub_filepath), true), $status_code),
        ]);

        return $http;
    }
}
