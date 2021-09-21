<?php

namespace Jasara\AmznSPA\Unit\DTOs\Responses\Notifications;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\DTOs\Schemas\DestinationListSchema;
use Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSchema;
use Jasara\AmznSPA\DTOs\Schemas\DestinationSchema;
use Jasara\AmznSPA\DTOs\Schemas\EventBridgeResourceSchema;
use Jasara\AmznSPA\DTOs\Schemas\SqsResourceSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class GetDestinationsResponseTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\DTOs\Responses\Notifications\GetDestinationsResponse
     * @covers \Jasara\AmznSPA\DTOs\Casts\DestinationListSchemaPayloadCaster
     * @covers \Jasara\AmznSPA\DTOs\Casts\DestinationResourceSchemaCaster
     */
    public function testSetupClass()
    {
        $destination_name = Str::random();
        $arn = Str::random();
        $event_bridge_name = Str::random();
        $event_bridge_region = Str::random();
        $event_bridge_account_id = Str::random();
        $destination_id = Str::random();

        $dto = new GetDestinationsResponse(
            payload: [
                [
                    'name' => $destination_name,
                    'destinationId' => $destination_id,
                    'resource' => [
                        'sqs' => [
                            'arn' => $arn,
                        ],
                        'eventBridge' => [
                            'name' => $event_bridge_name,
                            'region' => $event_bridge_region,
                            'accountId' => $event_bridge_account_id,
                        ],
                    ],
                ],
            ],
        );

        $this->assertInstanceOf(DestinationListSchema::class, $dto->payload);
        $this->assertCount(1, $dto->payload);
        $this->assertInstanceOf(DestinationSchema::class, $dto->payload->first());

        /** @var DestinationSchema $destination */
        $destination = $dto->payload->first();
        $this->assertEquals($destination_name, $destination->name);
        $this->assertEquals($destination_id, $destination->destination_id);
        $this->assertInstanceOf(DestinationResourceSchema::class, $destination->resource);
        $this->assertInstanceOf(SqsResourceSchema::class, $destination->resource->sqs);
        $this->assertInstanceOf(EventBridgeResourceSchema::class, $destination->resource->event_bridge);

        $this->assertEquals($arn, $destination->resource->sqs->arn);
        $this->assertEquals($event_bridge_name, $destination->resource->event_bridge->name);
        $this->assertEquals($event_bridge_region, $destination->resource->event_bridge->region);
        $this->assertEquals($event_bridge_account_id, $destination->resource->event_bridge->account_id);
    }
}
