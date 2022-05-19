<?php

namespace Jasara\AmznSPA\Resources\CatalogItems;

use Illuminate\Support\Arr;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20220401\GetCatalogItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20220401\ItemSearchResults;
use Jasara\AmznSPA\Enums\CatalogItems\ItemIdentifierTypes;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class CatalogItems20220401Resource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/catalog/2022-04-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function searchCatalogItems(
        array $marketplace_ids,
        ?array $identifiers = null,
        ?string $identifiers_type = null,
        ?array $keywords = null,
        ?array $included_data = null,
        ?array $brand_names = null,
        ?array $classification_ids = null,
        ?int $page_size = null,
        ?string $page_token = null,
        ?string $keywords_locale = null,
        ?string $locale = null,
        ?string $seller_id = null,
    ): ItemSearchResults {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        if ($identifiers) {
            $this->validateIsArrayOfStrings($identifiers);
        }
        if ($identifiers_type) {
            $this->validateStringEnum($identifiers_type, ItemIdentifierTypes::class);
        }
        if ($keywords) {
            $this->validateIsArrayOfStrings($keywords);
        }
        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA_ITEMS);
        }
        if ($brand_names) {
            $this->validateIsArrayOfStrings($brand_names);
        }
        if ($classification_ids) {
            $this->validateIsArrayOfStrings($classification_ids);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'items', array_filter([
            'identifiers' => $identifiers,
            'identifiersType' => $identifiers_type,
            'keywords' => $keywords,
            'marketplaceIds' => $marketplace_ids,
            'includedData' => $included_data,
            'brandNames' => $brand_names,
            'classificationIds' => $classification_ids,
            'pageSize' => $page_size,
            'pageToken' => $page_token,
            'keywordsLocale' => $keywords_locale,
            'locale' => $locale,
            'sellerId' => $seller_id,
        ]));

        return new ItemSearchResults($response);
    }

    public function getCatalogItem(
        string $asin,
        array $marketplace_ids,
        ?array $included_data = null,
        ?string $locale = null,
    ): GetCatalogItemResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA_ITEMS);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'items/' . $asin, array_filter([
            'marketplaceIds' => $marketplace_ids,
            'includedData' => $included_data,
            'locale' => $locale,
        ]));

        $errors = Arr::get($response, 'errors');

        return new GetCatalogItemResponse(
            errors: $errors,
            item: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }
}
