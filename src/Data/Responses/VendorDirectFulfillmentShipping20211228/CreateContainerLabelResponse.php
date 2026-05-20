<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228\ContainerLabelSchema;

class CreateContainerLabelResponse extends BaseResponse
{
    public function __construct(
        public ?ContainerLabelSchema $container_label = null,
    ) {}

}
