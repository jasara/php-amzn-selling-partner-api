<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Data\Responses\AplusContent\CreateContentDocumentResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\GetContentDocumentResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\ListContentDocumentAsinRelationsResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\PostContentDocumentApprovalSubmissionResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\PostContentDocumentAsinRelationsResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\PostContentDocumentSuspendSubmissionResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\SearchContentDocumentsResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\SearchContentPublishRecordsResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\UpdateContentDocumentResponse;
use Jasara\AmznSPA\Data\Responses\AplusContent\ValidateContentDocumentAsinRelationsResponse;
use Jasara\AmznSPA\Resources\AplusContentResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AplusContentResource::class)]
class AplusContentResourceTest extends UnitTestCase
{
    public function test_search_content_documents(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/search-content-documents');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->searchContentDocuments(
            marketplace_id: 'ATVPDKIKX0DER',
            page_token: 'pageTokenValue',
        );

        $this->assertInstanceOf(SearchContentDocumentsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments?marketplaceId=ATVPDKIKX0DER&pageToken=pageTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_content_document(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/create-content-document');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->createContentDocument(
            marketplace_id: 'ATVPDKIKX0DER',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateContentDocumentResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments?marketplaceId=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_content_document(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/get-content-document');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->getContentDocument(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
            included_data_set: [
                0 => 'includedDataSetOne',
                1 => 'includedDataSetTwo',
            ],
        );

        $this->assertInstanceOf(GetContentDocumentResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue?marketplaceId=ATVPDKIKX0DER&includedDataSet=includedDataSetOne,includedDataSetTwo', urldecode($request->url()));

            return true;
        });
    }

    public function test_update_content_document(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/update-content-document');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->updateContentDocument(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(UpdateContentDocumentResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue?marketplaceId=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_list_content_document_asin_relations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/list-content-document-asin-relations');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->listContentDocumentAsinRelations(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
            included_data_set: [
                0 => 'includedDataSetOne',
                1 => 'includedDataSetTwo',
            ],
            asin_set: [
                0 => 'asinSetOne',
                1 => 'asinSetTwo',
            ],
            page_token: 'pageTokenValue',
        );

        $this->assertInstanceOf(ListContentDocumentAsinRelationsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue/asins?marketplaceId=ATVPDKIKX0DER&includedDataSet=includedDataSetOne,includedDataSetTwo&asinSet=asinSetOne,asinSetTwo&pageToken=pageTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_post_content_document_asin_relations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/post-content-document-asin-relations');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->postContentDocumentAsinRelations(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(PostContentDocumentAsinRelationsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue/asins?marketplaceId=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_validate_content_document_asin_relations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/validate-content-document-asin-relations');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->validateContentDocumentAsinRelations(
            marketplace_id: 'ATVPDKIKX0DER',
            asin_set: [
                0 => 'asinSetOne',
                1 => 'asinSetTwo',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(ValidateContentDocumentAsinRelationsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentAsinValidations?marketplaceId=ATVPDKIKX0DER&asinSet=asinSetOne,asinSetTwo', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_search_content_publish_records(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/search-content-publish-records');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->searchContentPublishRecords(
            marketplace_id: 'ATVPDKIKX0DER',
            asin: 'asinValue',
            page_token: 'pageTokenValue',
        );

        $this->assertInstanceOf(SearchContentPublishRecordsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentPublishRecords?marketplaceId=ATVPDKIKX0DER&asin=asinValue&pageToken=pageTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_post_content_document_approval_submission(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/post-content-document-approval-submission');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->postContentDocumentApprovalSubmission(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
        );

        $this->assertInstanceOf(PostContentDocumentApprovalSubmissionResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue/approvalSubmissions?marketplaceId=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
            ], $request->data());

            return true;
        });
    }

    public function test_post_content_document_suspend_submission(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('aplus-content/post-content-document-suspend-submission');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getAplusContent();
        $response = $resource->postContentDocumentSuspendSubmission(
            content_reference_key: 'contentReferenceKeyValue',
            marketplace_id: 'ATVPDKIKX0DER',
        );

        $this->assertInstanceOf(PostContentDocumentSuspendSubmissionResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/aplus/2020-11-01/contentDocuments/contentReferenceKeyValue/suspendSubmissions?marketplaceId=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
            ], $request->data());

            return true;
        });
    }
}
