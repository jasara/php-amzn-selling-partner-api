<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\InvalidResourceException;

class AmznSPATest extends UnitTestCase
{
    public function testInvalidResource()
    {
        $this->expectException(InvalidResourceException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->not_a_resource;
    }

    public function testUsingMarketplace()
    {
        $config = $this->setupMinimalConfig();
        $amzn = new AmznSPA($config);

        $new_marketplace_id = Str::random();
        $this->assertEquals($config->marketplace_id, $amzn->getMarketplaceId());
        $new_amzn = $amzn->usingMarketplace($new_marketplace_id);

        // Doesn't change original object
        $this->assertEquals($config->marketplace_id, $amzn->getMarketplaceId());

        $this->assertEquals($new_marketplace_id, $new_amzn->getMarketplaceId());
    }

    public function testUsingHttp()
    {
        $state = Str::random();
        $test_string_1 = Str::random();
        $http = new Factory;
        $http->fake([
            '*' => $http->response(['access_token' => $test_string_1]),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $amzn = new AmznSPA($config);

        $result = $amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);

        $this->assertEquals($test_string_1, Arr::get($result, 'access_token'));

        $test_string_2 = Str::random();
        $new_http = new Factory;
        $new_http->fake([
            '*' => $new_http->response(['access_token' => $test_string_2]),
        ]);

        $new_amzn = $amzn->usingHttp($new_http);

        $result_2 = $new_amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);

        $this->assertEquals($test_string_2, Arr::get($result_2, 'access_token'));
    }
}
