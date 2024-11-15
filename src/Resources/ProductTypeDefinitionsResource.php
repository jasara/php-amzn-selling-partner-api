<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions\ProductTypeDefinitionResponse;
use Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions\ProductTypeListResponse;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\Locale;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ProductTypeDefinitionsResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/definitions/2020-09-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function searchDefinitionsProductTypes(
        array $marketplace_ids,
        ?array $keywords = null,
    ): ProductTypeListResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        if ($keywords) {
            $this->validateIsArrayOfStrings($keywords);
        }

        $response = $this->http
            ->responseClass(ProductTypeListResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'productTypes', array_filter([
                'marketplaceIds' => $marketplace_ids,
                'keywords' => $keywords,
            ]));

        return $response;
    }

    public function getDefinitionsProductType(
        string $product_type,
        array $marketplace_ids,
        ?string $seller_id = null,
        ?string $product_type_version = null,
        ?string $requirements = null,
        ?string $requirements_enforced = null,
        ?string $locale = null,
    ): ProductTypeDefinitionResponse|ErrorListResponse {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        if ($product_type_version) {
            $this->validateStringEnum($product_type_version, ['LATEST', 'RELEASE_CANDIDATE']);
        }
        if ($requirements) {
            $this->validateStringEnum($requirements, ['LISTING', 'LISTING_PRODUCT_ONLY', 'LISTING_OFFER_ONLY']);
        }
        if ($requirements_enforced) {
            $this->validateStringEnum($requirements_enforced, ['ENFORCED', 'NOT_ENFORCED']);
        }
        if ($locale) {
            $this->validateStringEnum($locale, Locale::class);
        }

        $response = $this->http
            ->responseClass(ProductTypeDefinitionResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'productTypes/' . $product_type, array_filter([
                'sellerId ' => $seller_id,
                'marketplaceIds' => $marketplace_ids,
                'productTypeVersion' => $product_type_version,
                'requirements' => $requirements,
                'requirementsEnforced' => $requirements_enforced,
                'locale' => $locale,
            ]));

        return $response;
    }
}
