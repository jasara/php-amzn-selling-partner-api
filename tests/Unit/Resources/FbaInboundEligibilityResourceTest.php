<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\FbaInboundEligibility\GetItemEligibilityPreviewResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class FbaInboundEligibilityResourceTest extends UnitTestCase
{
    public function testGetItemEligibilityPreview()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fba-inbound-eligibility/get-item-eligibility-preview');

        $marketplace_ids = ['ATVPDKIKX0DER'];
        $asin = 'hello';
        $program = 'INBOUND';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fba_inbound_eligibility->getItemEligibilityPreview(
            marketplace_ids:$marketplace_ids,
            asin:$asin,
            program:$program
        );

        $this->assertInstanceOf(GetItemEligibilityPreviewResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v1/eligibility/itemPreview?marketplaceIds=ATVPDKIKX0DER&asin=hello&program=INBOUND', $request->url());

            return true;
        });
    }
}
