<?php

namespace Jasara\AmznSPA\Tests\Unit\DataTransferObjects\Responses\Notifications;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\SubscriptionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class GetSubscriptionResponseTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse
     * @covers \Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetSubscriptionResponse
     * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema
     * @covers \Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorSchema
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
            errors: [
                [
                    'code' => $error_code,
                    'message' => $error_message,
                    'details' => $error_details,
                ],
            ],
            payload: array_keys_to_snake([
                'subscriptionId' => $subscription_id,
                'payloadVersion' => $payload_version,
                'destinationId' => $destination_id,
            ])
        );

        $this->assertInstanceOf(ErrorListSchema::class, $dto->errors);
        $error_schema = $dto->errors->first();
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
