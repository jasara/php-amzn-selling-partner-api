<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\Feeds\CreateFeedDocumentSpecification;
use Jasara\AmznSPA\DataTransferObjects\Requests\Feeds\CreateFeedSpecification;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\CreateFeedDocumentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\CreateFeedResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedDocumentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedsResponse;
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
    ): GetFeedsResponse {
        if ($feed_types) {
            $this->validateIsArrayOfStrings($feed_types, AmazonEnums::FEED_TYPES);
        }
        if ($marketplace_ids) {
            $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        }
        if ($processing_statuses) {
            $this->validateIsArrayOfStrings($processing_statuses, AmazonEnums::PROCESSING_STATUSES);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'feeds', array_filter([
            'feedTypes' => $feed_types,
            'marketplaceIds' => $marketplace_ids,
            'pageSize' => $page_size,
            'processingStatuses' => $processing_statuses,
            'createdSince' => $created_since?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
            'createdUntil' => $created_until?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
            'nextToken' => $next_token,
        ]));

        return new GetFeedsResponse($response);
    }

    public function createFeed(CreateFeedSpecification $request): CreateFeedResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'feeds', (array) $request->toArrayObject());

        $errors = Arr::get($response, 'errors');

        return new CreateFeedResponse(
            errors: $errors,
            feed: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }

    public function getFeed(string $feed_id): GetFeedResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'feeds/' . $feed_id);

        $errors = Arr::get($response, 'errors');

        return new GetFeedResponse(
            errors: $errors,
            feed: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }

    public function cancelFeed(string $feed_id): BaseResponse
    {
        $response = $this->http->delete($this->endpoint . self::BASE_PATH . 'feeds/' . $feed_id);

        return new BaseResponse($response);
    }

    public function createFeedDocument(CreateFeedDocumentSpecification $request): CreateFeedDocumentResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'documents', (array) $request->toArrayObject());

        return new CreateFeedDocumentResponse($response);
    }

    public function getFeedDocument(string $feed_document_id): GetFeedDocumentResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'documents/' . $feed_document_id);

        $errors = Arr::get($response, 'errors');

        return new GetFeedDocumentResponse(
            errors: $errors,
            feed_document: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }
}
