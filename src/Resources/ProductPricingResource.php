<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetPricingResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ProductPricingResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/products/pricing/v0/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getPricing(string $marketplace_id, string $item_type, ?array $asins = [], ?array $skus = [], ?string $item_condition = null, ?string $offer_type = null): GetPricingResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateIsArrayOfStrings($asins);
        $this->validateIsArrayOfStrings($skus);
        $this->validateStringEnum($item_type, ['asin', 'sku']);
        if ($item_condition) {
            $this->validateStringEnum($item_condition, AmazonEnums::ITEM_CONDITION);
        }
        if ($offer_type) {
            $this->validateStringEnum($offer_type, ['B2C', 'B2B']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'price');

        return new GetPricingResponse($response);
    }

    public function getCompetitivePricing(string $marketplace_id, string $item_type, ?array $asins = [], ?array $skus = [], ?string $customer_type = null, ): GetPricingResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateIsArrayOfStrings($asins);
        $this->validateIsArrayOfStrings($skus);
        $this->validateStringEnum($item_type, ['asin', 'sku']);
        if ($customer_type) {
            $this->validateStringEnum($customer_type, ['Consumer', 'Business']);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'competitivePrice');

        return new GetPricingResponse($response);
    }
}
