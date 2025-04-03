<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetInboundGuidanceResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\GetInboundGuidanceResultSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
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

        $dto = GetInboundGuidanceResponse::from(
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
}
