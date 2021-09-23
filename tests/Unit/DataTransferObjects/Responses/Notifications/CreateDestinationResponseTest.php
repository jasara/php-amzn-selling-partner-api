<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Responses\Notifications;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\CreateDestinationResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationResourceSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\EventBridgeResourceSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\SqsResourceSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class CreateDestinationResponseTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\CreateDestinationResponse
     */
    public function testSetupClass()
    {
        $destination_name = Str::random();
        $arn = Str::random();
        $event_bridge_name = Str::random();
        $event_bridge_region = Str::random();
        $event_bridge_account_id = Str::random();
        $destination_id = Str::random();

        $dto = new CreateDestinationResponse(
            payload: array_keys_to_snake([
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
            ]),
        );

        $this->assertInstanceOf(DestinationSchema::class, $dto->payload);

        $destination = $dto->payload;
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
