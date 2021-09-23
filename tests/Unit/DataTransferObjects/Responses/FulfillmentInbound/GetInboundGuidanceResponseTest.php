<?php

namespace Jasara\AmznSPA\Unit\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetInboundGuidanceResultSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use Spatie\DataTransferObject\Exceptions\ValidationException;

/**
 * @covers \Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse
 * @covers \Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator
 * @covers \Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator
 */
class GetInboundGuidanceResponseTest extends UnitTestCase
{
    public function testSetupDtoSuccess()
    {
        $payload = [
            'SKUInboundGuidanceList' => [
                [
                    'SellerSKU' => 'SellerSKU',
                    'ASIN' => 'ASIN',
                    'InboundGuidance' => 'InboundNotRecommended',
                    'GuidanceReasonList' => [
                        'SlowMovingASIN',
                    ],
                ],
            ],
            'InvalidSKUList' => [
                [
                    'SellerSKU' => 'SellerSKU',
                    'ErrorReason' => 'DoesNotExist',
                ],
            ],
            'ASINInboundGuidanceList' => [
                [
                    'ASIN' => 'ASIN',
                    'InboundGuidance' => 'InboundNotRecommended',
                    'GuidanceReasonList' => [
                        'SlowMovingASIN',
                    ],
                ],
            ],
            'InvalidASINList' => [
                [
                    'ASIN' => 'ASIN',
                    'ErrorReason' => 'DoesNotExist',
                ],
            ],
        ];

        $dto = new GetInboundGuidanceResponse(
            payload: array_keys_to_snake($payload),
        );

        $this->assertInstanceOf(GetInboundGuidanceResultSchema::class, $dto->payload);
        $this->assertEquals('SellerSKU', $dto->payload->sku_inbound_guidance_list[0]->seller_sku);
        $this->assertEquals('ASIN', $dto->payload->sku_inbound_guidance_list[0]->asin);
        $this->assertEquals('InboundNotRecommended', $dto->payload->sku_inbound_guidance_list[0]->inbound_guidance);
        $this->assertContains('SlowMovingASIN', $dto->payload->sku_inbound_guidance_list[0]->guidance_reason_list);

        $this->assertEquals('SellerSKU', $dto->payload->invalid_sku_list[0]->seller_sku);
        $this->assertEquals('DoesNotExist', $dto->payload->invalid_sku_list[0]->error_reason);

        $this->assertEquals('ASIN', $dto->payload->asin_inbound_guidance_list[0]->asin);
        $this->assertEquals('InboundNotRecommended', $dto->payload->asin_inbound_guidance_list[0]->inbound_guidance);
        $this->assertContains('SlowMovingASIN', $dto->payload->asin_inbound_guidance_list[0]->guidance_reason_list);

        $this->assertEquals('ASIN', $dto->payload->invalid_asin_list[0]->asin);
        $this->assertEquals('DoesNotExist', $dto->payload->invalid_asin_list[0]->error_reason);
    }

    public function testSetupDtoStringValidationErrors()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('NOTVALID is not an allowed result. Valid values are: InboundNotRecommended,InboundOK');

        $payload = [
            'SKUInboundGuidanceList' => [
                [
                    'SellerSKU' => 'SellerSKU',
                    'ASIN' => 'ASIN',
                    'InboundGuidance' => 'NOTVALID',
                    'GuidanceReasonList' => [
                        'SlowMovingASIN',
                    ],
                ],
            ],
        ];

        new GetInboundGuidanceResponse(
            payload: array_keys_to_snake($payload),
        );
    }

    public function testSetupDtoStringArrayValidationErrors()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('NOTVALID is not an allowed result. Valid values are: SlowMovingASIN,NoApplicableGuidance');

        $payload = [
            'SKUInboundGuidanceList' => [
                [
                    'SellerSKU' => 'SellerSKU',
                    'ASIN' => 'ASIN',
                    'InboundGuidance' => 'InboundNotRecommended',
                    'GuidanceReasonList' => [
                        'NOTVALID',
                    ],
                ],
            ],
        ];

        new GetInboundGuidanceResponse(
            payload: array_keys_to_snake($payload),
        );
    }
}
