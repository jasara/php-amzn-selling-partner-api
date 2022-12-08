<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersResponseListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersResponseSchema;

class GetListingOffersBatchResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ListingOffersResponseSchema::class)]
    public ?ListingOffersResponseListSchema $responses;
}
