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

        $request_array = (array) $request->toArrayObject();
        $request_array['attributes'] = $request->attributes->toArrayObject();

        $response = $this->http
            ->responseClass(ListingsItemSubmissionResponse::class)
            ->put(
                $this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                    array_filter([
                        'marketplaceIds' => implode(',', $marketplace_ids),
                        'issueLocale' => $issue_locale,
                    ])
                ),
                $request_array,
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
            ->delete($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku), array_filter([
                'marketplaceIds' => implode(',', $marketplace_ids),
                'issueLocale' => $issue_locale,
            ]));

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
                (array) $request->toArrayObject()
            );

        return $response;
    }
}
