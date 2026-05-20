<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Solicitations\CreateProductReviewAndSellerFeedbackSolicitationResponse;
use Jasara\AmznSPA\Data\Responses\Solicitations\GetSolicitationActionsForOrderResponse;
use Jasara\AmznSPA\Resources\SolicitationsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(SolicitationsResource::class)]
class SolicitationsResourceTest extends UnitTestCase
{
    public function test_get_solicitation_actions_for_order(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('solicitations/get-solicitation-actions-for-order');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->solicitations->getSolicitationActionsForOrder(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
        );

        $this->assertInstanceOf(GetSolicitationActionsForOrderResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/solicitations/v1/orders/amazonOrderIdValue?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_product_review_and_seller_feedback_solicitation(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('solicitations/create-product-review-and-seller-feedback-solicitation');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->solicitations->createProductReviewAndSellerFeedbackSolicitation(
            amazon_order_id: 'amazonOrderIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
        );

        $this->assertInstanceOf(CreateProductReviewAndSellerFeedbackSolicitationResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/solicitations/v1/orders/amazonOrderIdValue/solicitations/productReviewAndSellerFeedback?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
            ], $request->data());

            return true;
        });
    }
}
