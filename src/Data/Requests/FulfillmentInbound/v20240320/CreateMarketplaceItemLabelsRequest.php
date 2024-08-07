<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ItemLabelPageType;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\LabelPrintType;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\MskuQuantitySchemaList;

class CreateMarketplaceItemLabelsRequest extends BaseRequest
{
    public function __construct(
        #[RuleValidator(['min:25', 'max:100'])]
        public ?int $height,
        public LabelPrintType $label_type,
        #[RuleValidator(['regex:/^[a-z]{2}_[A-Z]{2}$/'])]
        public ?string $locale_code,
        #[RuleValidator(['min:1', 'max:256'])]
        public string $marketplace_id,
        public MskuQuantitySchemaList $msku_quantities,
        public ?ItemLabelPageType $page_type,
        #[RuleValidator(['min:25', 'max:100'])]
        public ?int $width,
    ) {
    }
}
