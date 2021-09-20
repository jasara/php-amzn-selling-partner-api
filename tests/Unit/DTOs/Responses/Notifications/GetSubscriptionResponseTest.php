<?php

namespace Jasara\AmznSPA\Unit\DTOs\Responses\Notifications;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DTOs\Schemas\ErrorSchema;
use Jasara\AmznSPA\DTOs\Schemas\SubscriptionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class GetSubscriptionResponseTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse
     * @covers \Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema
     * @covers \Jasara\AmznSPA\DTOs\Schemas\ErrorSchema
     * @covers \Jasara\AmznSPA\DTOs\Casts\SubscriptionSchemaPayloadCaster
     * @covers \Jasara\AmznSPA\DTOs\Casts\ErrorCollectionCaster
     */
    public function testSetupClass()
    {
        $error_code = Str::random();
        $error_message = Str::random();
        $error_details = Str::random();
        $subscription_id = Str::random();
        $payload_version = Str::random();
        $destination_id = Str::random();

        $dto = new GetSubscriptionResponse(
            error_list: [
                [
                    'code' => $error_code,
                    'message' => $error_message,
                    'details' => $error_details,
                ],
            ],
            payload: [
                'subscriptionId' => $subscription_id,
                'payloadVersion' => $payload_version,
                'destinationId' => $destination_id,
            ]
        );

        $this->assertInstanceOf(ErrorListSchema::class, $dto->error_list);
        $error_schema = $dto->error_list->first();
        $this->assertInstanceOf(ErrorSchema::class, $error_schema);
        /** @var ErrorSchema $error_schema */
        $this->assertEquals($error_code, $error_schema->code);
        $this->assertEquals($error_message, $error_schema->message);
        $this->assertEquals($error_details, $error_schema->details);

        $this->assertInstanceOf(SubscriptionSchema::class, $dto->payload);
        $this->assertEquals($subscription_id, $dto->payload->subscription_id);
        $this->assertEquals($payload_version, $dto->payload->payload_version);
        $this->assertEquals($destination_id, $dto->payload->destination_id);
    }
}
