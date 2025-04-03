<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Data\Proxy;

trait SetupAmznSPAConfig
{
    public function setupMinimalConfig(?string $marketplace_id = null, ?Factory $http = null): AmznSPAConfig
    {
        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id ?: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random() . '.com',
            lwa_refresh_token: Str::random(),
            lwa_access_token: Str::random(),
            grantless_access_token: Str::random(),
            aws_access_key: Str::random(),
            aws_secret_key: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
        );

        if ($http) {
            $config->setHttp($http);
        }

        return $config;
    }

    public function setupMinimalProxyConfig(
        Proxy $proxy,
        ?string $marketplace_id = null,
        ?Factory $http = null,
    ): AmznSPAConfig {
        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id ?: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random() . '.com',
            lwa_refresh_token: Str::random(),
            lwa_access_token: Str::random(),
            grantless_access_token: Str::random(),
            aws_access_key: Str::random(),
            aws_secret_key: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
            proxy: $proxy,
        );

        if ($http) {
            $config->setHttp($http);
        }

        return $config;
    }

    public function setupLiveConfig(): AmznSPAConfig
    {
        $config = new AmznSPAConfig(
            marketplace_id: 'ATVPDKIKX0DER',
            application_id: env('APPLICATION_ID'),
            lwa_refresh_token: env('SELF_REFRESH_TOKEN'),
            aws_access_key: env('AWS_ACCESS_KEY'),
            aws_secret_key: env('AWS_SECRET_KEY'),
            lwa_client_id: env('LWA_CLIENT_ID'),
            lwa_client_secret: env('LWA_CLIENT_SECRET'),
            use_test_endpoints: env('AMZN_SPA_TEST_ENDPOINTS'),
        );

        return $config;
    }

    /** @return array{0: AmznSPAConfig, 1: Factory} */
    public function setupConfigWithFakeHttp(string | array $stubs, int $status_code = 200): array
    {
        if (is_string($stubs)) {
            $stubs = [$stubs];
        }

        $http = $this->fakeHttpStub($stubs, $status_code);

        $config = $this->setupMinimalConfig(null, $http);

        return [$config, $http];
    }

    public function fakeHttpStub(array $stubs, int $status_code = 200): Factory
    {
        $http = new Factory;

        $sequence = $http->sequence();
        foreach ($stubs as $stub) {
            $sequence = $sequence->push($this->loadHttpStub($stub), $status_code, [
                'x-amzn-RequestId' => Str::random(),
            ]);
        }

        $http->fake([
            '*' => $sequence,
        ]);

        return $http;
    }

    public function loadHttpStub(string $stub): array
    {
        $stub_filepath = __DIR__ . '/../stubs/' . $stub . '.json';

        return json_decode(file_get_contents($stub_filepath), true);
    }
}
