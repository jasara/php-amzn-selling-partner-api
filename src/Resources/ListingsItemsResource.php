<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\GetListingsItemResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\ListingsItemSubmissionResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\SearchListingsItemsResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ListingsItemsResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/listings/2021-08-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale = null,
        ?array $included_data = null,
    ): GetListingsItemResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA);
        }

        $response = $this->http
            ->responseClass(GetListingsItemResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku), array_filter([
                'marketplaceIds' => $marketplace_ids,
                'issueLocale' => $issue_locale,
                'includedData' => $included_data,
            ]));

        return $response;
    }

    public function putListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
        ListingsItemPutRequest $request,
    ): ListingsItemSubmissionResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(ListingsItemSubmissionResponse::class)
            ->put(
                $this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                    array_filter([
                        'marketplaceIds' => implode(',', $marketplace_ids),
                        'issueLocale' => $issue_locale,
                    ])
                ),
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function deleteListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
    ): ListingsItemSubmissionResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(ListingsItemSubmissionResponse::class)
            ->delete($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                array_filter([
                    'marketplaceIds' => implode(',', $marketplace_ids),
                    'issueLocale' => $issue_locale,
                ])
            ));

        return $response;
    }

    public function patchListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
        ListingsItemPatchRequest $request,
    ): ListingsItemSubmissionResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(ListingsItemSubmissionResponse::class)
            ->patch(
                $this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                    array_filter([
                        'marketplaceIds' => implode(',', $marketplace_ids),
                        'issueLocale' => $issue_locale,
                    ])
                ),
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function searchListingsItems(
        string $seller_id,
        array $marketplace_ids,
        ?string $issue_locale = null,
        ?array $included_data = null,
        ?array $identifiers = null,
        ?string $identifiers_type = null,
        ?string $variation_parent_sku = null,
        ?string $package_hierarchy_sku = null,
        ?string $created_after = null,
        ?string $created_before = null,
        ?string $last_updated_after = null,
        ?string $last_updated_before = null,
        ?array $with_issue_severity = null,
        ?array $with_status = null,
        ?array $without_status = null,
        ?string $sort_by = 'lastUpdatedDate',
        ?string $sort_order = 'DESC',
        ?int $page_size = 10,
        ?string $page_token = null,
    ): SearchListingsItemsResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        
        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA);
        }
        
        if ($identifiers) {
            $this->validateIsArrayOfStrings($identifiers);
            if (count($identifiers) > 20) {
                throw new \InvalidArgumentException('Maximum 20 identifiers allowed');
            }
            if (!$identifiers_type) {
                throw new \InvalidArgumentException('identifiers_type is required when identifiers is provided');
            }
        }
        
        if ($identifiers_type) {
            $this->validateStringEnum($identifiers_type, AmazonEnums::IDENTIFIERS_TYPE);
            if (!$identifiers) {
                throw new \InvalidArgumentException('identifiers is required when identifiers_type is provided');
            }
        }
        
        if ($variation_parent_sku && ($identifiers || $package_hierarchy_sku)) {
            throw new \InvalidArgumentException('variation_parent_sku cannot be used with identifiers or package_hierarchy_sku');
        }
        
        if ($package_hierarchy_sku && ($identifiers || $variation_parent_sku)) {
            throw new \InvalidArgumentException('package_hierarchy_sku cannot be used with identifiers or variation_parent_sku');
        }
        
        if ($with_issue_severity) {
            $this->validateIsArrayOfStrings($with_issue_severity, AmazonEnums::ISSUE_SEVERITY);
        }
        
        if ($with_status) {
            $this->validateIsArrayOfStrings($with_status, AmazonEnums::LISTINGS_STATUS);
        }
        
        if ($without_status) {
            $this->validateIsArrayOfStrings($without_status, AmazonEnums::LISTINGS_STATUS);
        }
        
        if ($sort_by) {
            $this->validateStringEnum($sort_by, AmazonEnums::SORT_BY);
        }
        
        if ($sort_order) {
            $this->validateStringEnum($sort_order, AmazonEnums::SORT_ORDER);
        }
        
        if ($page_size !== null && ($page_size < 1 || $page_size > 20)) {
            throw new \InvalidArgumentException('page_size must be between 1 and 20');
        }

        $response = $this->http
            ->responseClass(SearchListingsItemsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'items/' . $seller_id, array_filter([
                'marketplaceIds' => $marketplace_ids,
                'issueLocale' => $issue_locale,
                'includedData' => $included_data,
                'identifiers' => $identifiers,
                'identifiersType' => $identifiers_type,
                'variationParentSku' => $variation_parent_sku,
                'packageHierarchySku' => $package_hierarchy_sku,
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'lastUpdatedAfter' => $last_updated_after,
                'lastUpdatedBefore' => $last_updated_before,
                'withIssueSeverity' => $with_issue_severity,
                'withStatus' => $with_status,
                'withoutStatus' => $without_status,
                'sortBy' => $sort_by,
                'sortOrder' => $sort_order,
                'pageSize' => $page_size,
                'pageToken' => $page_token,
            ]));

        return $response;
    }
}
