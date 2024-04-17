<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Responses\Notifications;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;
use Jasara\AmznSPA\Data\Schemas\ErrorSchema;
use Jasara\AmznSPA\Data\Schemas\Notifications\SubscriptionSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(BaseResponse::class)]
#[CoversClass(GetSubscriptionResponse::class)]
#[CoversClass(ErrorListSchema::class)]
#[CoversClass(ErrorSchema::class)]
class GetSubscriptionResponseTest extends UnitTestCase
{
    public function testSetupClass()
    {
        $error_code = Str::random();
        $error_message = Str::random();
        $error_details = Str::random();
        $subscription_id = Str::random();
        $payload_version = Str::random();
        $destination_id = Str::random();

        $dto = GetSubscriptionResponse::from(
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
        /* @var ErrorSchema $error_schema */
        $this->assertEquals($error_code, $error_schema->code);
        $this->assertEquals($error_message, $error_schema->message);
        $this->assertEquals($error_details, $error_schema->details);

        $this->assertInstanceOf(SubscriptionSchema::class, $dto->payload);
        $this->assertEquals($subscription_id, $dto->payload->subscription_id);
        $this->assertEquals($payload_version, $dto->payload->payload_version);
        $this->assertEquals($destination_id, $dto->payload->destination_id);
    }
}
