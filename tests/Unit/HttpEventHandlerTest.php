<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\HttpEventHandler
 */
class HttpEventHandlerTest extends UnitTestCase
{
    public function testHandle401()
    {
        $this->expectException(AuthenticationException::class);

        $state = Str::random();

        list($config) = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testStatusCodeWithNoHandler()
    {
        $this->expectException(RequestException::class);

        $state = Str::random();

        list($config) = $this->setupConfigWithFakeHttp('errors/invalid-client', 510);

        $amzn = new AmznSPA($config);
        $amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testErrorStatusWithNoErrorData()
    {
        $this->expectException(RequestException::class);

        $state = Str::random();

        list($config) = $this->setupConfigWithFakeHttp('errors/no-error-in-data', 401);

        $amzn = new AmznSPA($config);
        $amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testErrorStatusWithNoErrorDescriptionData()
    {
        $this->expectException(RequestException::class);

        $state = Str::random();

        list($config) = $this->setupConfigWithFakeHttp('errors/no-error-description-in-data', 401);

        $amzn = new AmznSPA($config);
        $amzn->oauth->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }
}
