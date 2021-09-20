<?php

namespace Jasara\AmznSPA\Unit\DTOs\Schemas;

use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use TypeError;

class ErrorListSchemaTest extends UnitTestCase
{
    public function testErrorPassingBadData()
    {
        $this->expectException(TypeError::class);

        new GetSubscriptionResponse(
            error_list: [
                ['test' => 'test'],
            ],
        );
    }
}
