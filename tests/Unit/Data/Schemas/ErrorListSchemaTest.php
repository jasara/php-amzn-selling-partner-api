<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ErrorListSchemaTest extends UnitTestCase
{
    public function testErrorPassingBadData()
    {
        $this->expectException(\TypeError::class);

        new GetSubscriptionResponse(
            errors: [
                ['test' => 'test'],
            ],
        );
    }
}
