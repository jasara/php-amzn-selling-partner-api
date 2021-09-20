<?php

namespace Jasara\AmznSPA\Unit\Traits;

use Illuminate\Http\Client\RequestException;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Traits\CallsAmazon
 */
class CallsAmazonTest extends UnitTestCase
{
    /**
     * @group external
     */
    public function testSetupHttp()
    {
        $this->expectException(RequestException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }
}
