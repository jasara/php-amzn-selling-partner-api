<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Traits\RefreshsToken
 */
class RefreshsTokenTest extends UnitTestCase
{
    public function testValidateOrRefreshTokenException()
    {
        $this->markTestIncomplete();

        $this->expectException(AmznSPAException::class);
        $this->expectExceptionMessage('Refresh token has not been set on config');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }
}
