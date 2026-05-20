<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
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
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;

class AplusContentResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function searchContentDocuments(
        string $marketplace_id,
        ?string $page_token = null
    ): SearchContentDocumentsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SearchContentDocumentsResponse::class)
            ->get($this->endpoint . '/aplus/2020-11-01/contentDocuments', $this->filterQuery([
                'marketplaceId' => $marketplace_id,
                'pageToken' => $page_token,
            ]));

        return $response;
    }

    public function createContentDocument(
        string $marketplace_id,
        array $request_body
    ): CreateContentDocumentResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateContentDocumentResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentDocuments' . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getContentDocument(
        string $content_reference_key,
        string $marketplace_id,
        array $included_data_set
    ): GetContentDocumentResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetContentDocumentResponse::class)
            ->get($this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key), $this->filterQuery([
                'marketplaceId' => $marketplace_id,
                'includedDataSet' => $included_data_set,
            ]));

        return $response;
    }

    public function updateContentDocument(
        string $content_reference_key,
        string $marketplace_id,
        array $request_body
    ): UpdateContentDocumentResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(UpdateContentDocumentResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key) . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function listContentDocumentAsinRelations(
        string $content_reference_key,
        string $marketplace_id,
        ?array $included_data_set = null,
        ?array $asin_set = null,
        ?string $page_token = null
    ): ListContentDocumentAsinRelationsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListContentDocumentAsinRelationsResponse::class)
            ->get($this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key) . '/asins', $this->filterQuery([
                'marketplaceId' => $marketplace_id,
                'includedDataSet' => $included_data_set,
                'asinSet' => $asin_set,
                'pageToken' => $page_token,
            ]));

        return $response;
    }

    public function postContentDocumentAsinRelations(
        string $content_reference_key,
        string $marketplace_id,
        array $request_body
    ): PostContentDocumentAsinRelationsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(PostContentDocumentAsinRelationsResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key) . '/asins' . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function validateContentDocumentAsinRelations(
        string $marketplace_id,
        array $request_body,
        ?array $asin_set = null
    ): ValidateContentDocumentAsinRelationsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ValidateContentDocumentAsinRelationsResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentAsinValidations' . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                    'asinSet' => $asin_set,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function searchContentPublishRecords(
        string $marketplace_id,
        string $asin,
        ?string $page_token = null
    ): SearchContentPublishRecordsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SearchContentPublishRecordsResponse::class)
            ->get($this->endpoint . '/aplus/2020-11-01/contentPublishRecords', $this->filterQuery([
                'marketplaceId' => $marketplace_id,
                'asin' => $asin,
                'pageToken' => $page_token,
            ]));

        return $response;
    }

    public function postContentDocumentApprovalSubmission(
        string $content_reference_key,
        string $marketplace_id
    ): PostContentDocumentApprovalSubmissionResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(PostContentDocumentApprovalSubmissionResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key) . '/approvalSubmissions' . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                ]),
                [],
            );

        return $response;
    }

    public function postContentDocumentSuspendSubmission(
        string $content_reference_key,
        string $marketplace_id
    ): PostContentDocumentSuspendSubmissionResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(PostContentDocumentSuspendSubmissionResponse::class)
            ->post(
                $this->endpoint . '/aplus/2020-11-01/contentDocuments/' . rawurlencode((string) $content_reference_key) . '/suspendSubmissions' . $this->buildQueryString([
                    'marketplaceId' => $marketplace_id,
                ]),
                [],
            );

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }

    private function buildQueryString(array $query): string
    {
        $query = $this->filterQuery($query);

        foreach ($query as $key => $value) {
            if (is_array($value) && array_values($value) === $value) {
                $query[$key] = implode(',', $value);
            }
        }

        return '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }
}
