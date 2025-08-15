<?php

namespace Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\CompetitiveSummaryIncludedDataList;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpMethod;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\LowestPricedOffersInputList;

class CompetitiveSummaryRequest extends BaseRequest
{
    public function __construct(
        public string $asin,
        public string $marketplace_id,
        public CompetitiveSummaryIncludedDataList $included_data,
        public HttpMethod $method,
        public string $uri,
        #[RuleValidator(['array', 'min:0', 'max:5'])]
        public ?LowestPricedOffersInputList $lowest_priced_offers_inputs = null,
    ) {
    }
}
