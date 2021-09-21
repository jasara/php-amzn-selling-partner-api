<?php

namespace Jasara\AmznSPA\Unit\DTOs\Schemas;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\DTOs\Schemas\EventBridgeResourceSpecificationSchema;
use Jasara\AmznSPA\DTOs\Schemas\SqsResourceSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSpecificationSchema
 * @covers \Jasara\AmznSPA\DTOs\Schemas\EventBridgeResourceSpecificationSchema
 */
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

        $array = $dto->toArray();

        $this->assertEquals($arn, $array['sqs']['arn']);
        $this->assertEquals($event_bridge_region, $array['eventBridge']['region']);
        $this->assertEquals($event_bridge_account_id, $array['eventBridge']['accountId']);
    }
}
