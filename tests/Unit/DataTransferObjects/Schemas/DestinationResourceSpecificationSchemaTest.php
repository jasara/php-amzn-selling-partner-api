<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Schemas;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\EventBridgeResourceSpecificationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\SqsResourceSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(BaseRequest::class)]
class DestinationResourceSpecificationSchemaTest extends UnitTestCase
{
    public function testToArray()
    {
        $arn = Str::random();
        $event_bridge_region = Str::random();
        $event_bridge_account_id = Str::random();

        $dto = new DestinationResourceSpecificationSchema(
            sqs: new SqsResourceSchema(
                arn: $arn,
            ),
            event_bridge: new EventBridgeResourceSpecificationSchema(
                region: $event_bridge_region,
                account_id: $event_bridge_account_id,
            ),
        );

        $array = $dto->toArrayObject();

        $this->assertEquals($arn, $array['sqs']['arn']);
        $this->assertEquals($event_bridge_region, $array['eventBridge']['region']);
        $this->assertEquals($event_bridge_account_id, $array['eventBridge']['accountId']);
    }
}
