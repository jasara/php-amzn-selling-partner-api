<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\ProductPricing\GetListingOffersBatchRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetListingOffersBatchResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetOffersResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetPricingResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ProductPricingResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/products/pricing/v0/';
    public const BATCH_BASE_PATH = '/batches/products/pricing/v0';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getPricing(
        string $marketplace_id,
        string $item_type,
        ?array $asins = [],
        ?array $skus = [],
        ?string $item_condition = null,
        ?string $offer_type = null,
    ): GetPricingResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateIsArrayOfStrings($asins);
        $this->validateIsArrayOfStrings($skus);
        $this->validateStringEnum($item_type, ['Asin', 'Sku']);
        if ($item_condition) {
            $this->validateStringEnum($item_condition, AmazonEnums::ITEM_CONDITION);
        }
        if ($offer_type) {
            $this->validateStringEnum($offer_type, ['B2C', 'B2B']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'price', array_filter([
            'MarketplaceId' => $marketplace_id,
            'ItemType' => $item_type,
            'Asins' => $asins,
            'Skus' =>$skus,
            'ItemCondition' =>$item_condition,
            'OfferType' => $offer_type,
        ]));

        return new GetPricingResponse($response);
    }

    public function getCompetitivePricing(
        string $marketplace_id,
        string $item_type,
        ?array $asins = [],
        ?array $skus = [],
        ?string $customer_type = null,
    ): GetPricingResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateIsArrayOfStrings($asins);
        $this->validateIsArrayOfStrings($skus);
        $this->validateStringEnum($item_type, ['Asin', 'Sku']);
        if ($customer_type) {
            $this->validateStringEnum($customer_type, ['Consumer', 'Business']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'competitivePrice', array_filter([
            'MarketplaceId' => $marketplace_id,
            'ItemType' => $item_type,
            'Asins' => $asins,
            'Skus' =>$skus,
            'CustomerType' => $customer_type,
        ]));

        return new GetPricingResponse($response);
    }

    public function getListingOffers(
        string $marketplace_id,
        string $item_condition,
        string $seller_sku,
        ?string $customer_type = null,
    ): GetOffersResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($item_condition, AmazonEnums::ITEM_CONDITION);
        if ($customer_type) {
            $this->validateStringEnum($customer_type, ['Consumer', 'Business']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'listings/' . $seller_sku . '/offers', array_filter([
            'MarketplaceId' => $marketplace_id,
            'ItemCondition' => $item_condition,
            'CustomerType' => $customer_type,
        ]));

        return new GetOffersResponse($response);
    }

    public function getListingOffersBatch(GetListingOffersBatchRequest $request): GetListingOffersBatchResponse {

        $response = $this->http->post($this->endpoint . self::BATCH_BASE_PATH . 'listingOffers', (array) $request->toArrayObject());

        return new GetListingOffersBatchResponse($response);
    }

    public function getItemOffers(
        string $marketplace_id,
        string $item_condition,
        string $asin,
        ?string $customer_type = null,
    ): GetOffersResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($item_condition, AmazonEnums::ITEM_CONDITION);
        if ($customer_type) {
            $this->validateStringEnum($customer_type, ['Consumer', 'Business']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'items/' . $asin . '/offers', array_filter([
            'MarketplaceId' => $marketplace_id,
            'ItemCondition' => $item_condition,
            'CustomerType' => $customer_type,
        ]));

        return new GetOffersResponse($response);
    }
}
