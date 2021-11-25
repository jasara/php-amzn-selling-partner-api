<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

class ListingsItemPutRequest extends BaseRequest
{
    public string $product_type;

    #[StringEnumValidator(['LISTING', 'LISTING_PRODUCT_ONLY', 'LISTING_OFFER_ONLY'])]
    public ?string $requirements;

    public array $attributes;
}
