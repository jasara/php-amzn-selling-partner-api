<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class BoxInputSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $box_id,
        public BoxContentInformationSource $content_information_source,
        public BoxContentListSchema $contents,
        public DimensionsSchema $dimensions,
        #[RuleValidator(['integer', 'min:1', 'max:10000'])]
        public int $quantity,
        #[RuleValidator(['min:1', 'max:1024'])]
        public string $template_name,
        public WeightSchema $weight,
    ) {
    }
}
