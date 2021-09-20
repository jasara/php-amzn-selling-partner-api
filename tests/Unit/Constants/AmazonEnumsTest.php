<?php

namespace Jasara\AmznSPA\Unit\Constants;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Constants\AmazonEnums
 */
class AmazonEnumsTest extends UnitTestCase
{
    /**
     * @covers ::notificationTypes
     */
    public function testNotificationTypes()
    {
        $types = AmazonEnums::notificationTypes();
        $this->assertCount(14, $types);
        foreach ($types as $type) {
            $this->assertIsString($type);
        }
    }
}
