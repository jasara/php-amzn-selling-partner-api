<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Support\Arr;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\GetListingsItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\ListingsItemSubmissionResponse;
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
    ): GetListingsItemResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku), array_filter([
            'marketplaceIds' => $marketplace_ids,
            'issueLocale' => $issue_locale,
            'includedData' => $included_data,
        ]));

        $errors = Arr::get($response, 'errors');

        return new GetListingsItemResponse(
            errors: $errors,
            item: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }

    public function putListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
        ListingsItemPutRequest $request,
    ): ListingsItemSubmissionResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http->put(
            $this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                array_filter([
                    'marketplaceIds' => implode(',', $marketplace_ids),
                    'issueLocale' => $issue_locale,
                ])
            ),
            (array) $request->toArrayObject()
        );

        return new ListingsItemSubmissionResponse($response);
    }

    public function deleteListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
    ): ListingsItemSubmissionResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http->delete($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku), array_filter([
            'marketplaceIds' => $marketplace_ids,
            'issueLocale' => $issue_locale,
        ]));

        return new ListingsItemSubmissionResponse($response);
    }

    public function patchListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale,
        ListingsItemPatchRequest $request,
    ): ListingsItemSubmissionResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http->put(
            $this->endpoint . self::BASE_PATH . 'items/' . $seller_id . '/' . rawurlencode($sku) . '?' . http_build_query(
                array_filter([
                    'marketplaceIds' => $marketplace_ids,
                    'issueLocale' => $issue_locale,
                ])
            ),
            (array) $request->toArrayObject()
        );

        return new ListingsItemSubmissionResponse($response);
    }
}
