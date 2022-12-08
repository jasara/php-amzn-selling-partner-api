<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersRequestListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersRequestSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetListingOffersBatchRequest extends BaseRequest
{
    #[CastWith(ArrayCaster::class, itemType: ListingOffersRequestSchema::class)]
    public ListingOffersRequestListSchema $requests;
}
