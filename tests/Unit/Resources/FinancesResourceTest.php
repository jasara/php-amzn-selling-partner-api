<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Finances\ListTransactionsResponse;
use Jasara\AmznSPA\Resources\FinancesResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FinancesResource::class)]
class FinancesResourceTest extends UnitTestCase
{
    public function test_list_transactions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('finances/list-transactions');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->finances->listTransactions(
            posted_after: 'postedAfterValue',
            posted_before: 'postedBeforeValue',
            marketplace_id: 'ATVPDKIKX0DER',
            transaction_status: 'transactionStatusValue',
            related_identifier_name: 'relatedIdentifierNameValue',
            related_identifier_value: 'relatedIdentifierValueValue',
            next_token: 'nextTokenValue',
        );

        $this->assertInstanceOf(ListTransactionsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/2024-06-19/transactions?postedAfter=postedAfterValue&postedBefore=postedBeforeValue&marketplaceId=ATVPDKIKX0DER&transactionStatus=transactionStatusValue&relatedIdentifierName=relatedIdentifierNameValue&relatedIdentifierValue=relatedIdentifierValueValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }
}
