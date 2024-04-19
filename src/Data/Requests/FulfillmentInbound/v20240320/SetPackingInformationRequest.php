<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PackageGroupingInputListSchema;

class SetPackingInformationRequest extends BaseRequest
{
    public function __construct(
        public ?PackageGroupingInputListSchema $package_groupings,
    ) {
    }
}
