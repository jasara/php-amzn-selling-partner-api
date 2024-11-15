<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Feeds\CreateFeedDocumentSpecification;
use Jasara\AmznSPA\Data\Requests\Feeds\CreateFeedSpecification;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Feeds\CreateFeedDocumentResponse;
use Jasara\AmznSPA\Data\Responses\Feeds\CreateFeedResponse;
use Jasara\AmznSPA\Data\Responses\Feeds\GetFeedDocumentResponse;
use Jasara\AmznSPA\Data\Responses\Feeds\GetFeedResponse;
use Jasara\AmznSPA\Data\Responses\Feeds\GetFeedsResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FeedsResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/feeds/2021-06-30/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getFeeds(
        ?array $feed_types = null,
        ?array $marketplace_ids = null,
        ?int $page_size = null,
        ?array $processing_statuses = null,
        ?CarbonImmutable $created_since = null,
        ?CarbonImmutable $created_until = null,
        ?string $next_token = null,
    ): GetFeedsResponse|ErrorListResponse {
        if ($feed_types) {
            $this->validateIsArrayOfStrings($feed_types, AmazonEnums::FEED_TYPES);
        }
        if ($marketplace_ids) {
            $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        }
        if ($processing_statuses) {
            $this->validateIsArrayOfStrings($processing_statuses, AmazonEnums::PROCESSING_STATUSES);
        }

        $response = $this->http
            ->responseClass(GetFeedsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'feeds', array_filter([
                'feedTypes' => $feed_types,
                'marketplaceIds' => $marketplace_ids,
                'pageSize' => $page_size,
                'processingStatuses' => $processing_statuses,
                'createdSince' => $created_since?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'createdUntil' => $created_until?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    public function createFeed(CreateFeedSpecification $request): CreateFeedResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateFeedResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'feeds', (array) $request->toArrayObject());

        return $response;
    }

    public function getFeed(string $feed_id): GetFeedResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetFeedResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'feeds/' . $feed_id);

        return $response;
    }

    public function cancelFeed(string $feed_id): BaseResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(BaseResponse::class)
            ->delete($this->endpoint . self::BASE_PATH . 'feeds/' . $feed_id);

        return $response;
    }

    public function createFeedDocument(CreateFeedDocumentSpecification $request): CreateFeedDocumentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateFeedDocumentResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'documents', (array) $request->toArrayObject());

        return $response;
    }

    public function getFeedDocument(string $feed_document_id): GetFeedDocumentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetFeedDocumentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'documents/' . $feed_document_id);

        return $response;
    }
}
