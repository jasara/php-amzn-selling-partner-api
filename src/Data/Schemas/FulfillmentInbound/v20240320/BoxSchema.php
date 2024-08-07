<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class BoxSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $box_id,
        public ?BoxContentInformationSource $content_information_source,
        public ?RegionSchema $destination_region,
        public ?DimensionsSchema $dimensions,
        public ?ItemSchemaList $items,
        #[RuleValidator(['size:38'])]
        public string $package_id,
        #[RuleValidator(['integer', 'min:1', 'max:10000'])]
        public ?int $quantity,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $template_name,
        public ?WeightSchema $weight,
    ) {
    }
}
