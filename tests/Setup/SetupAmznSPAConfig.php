<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;

trait SetupAmznSPAConfig
{
    public function setupMinimalConfig(string $marketplace_id = null, Factory $http = null)
    {
        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id ?: Str::random(),
            application_id: Str::random(),
            redirect_url: Str::random() . '.com',
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
        );

        if ($http) {
            $config->http = $http;
        }

        return $config;
    }

    public function setupConfigWithFakeHttp(string $stub, int $status_code = 200)
    {
        $http = $this->fakeHttpStub($stub, $status_code);

        $config = $this->setupMinimalConfig(null, $http);

        return [$config, $http];
    }

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
