<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetSubscriptionResponse;
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
