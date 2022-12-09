<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ProductPricing;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersRequestListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\ListingOffersRequestSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use ReflectionProperty;
use Illuminate\Support\Str;

class GetListingOffersBatchRequest extends BaseRequest implements PascalCaseRequestContract
{
    #[CastWith(ArrayCaster::class, itemType: ListingOffersRequestSchema::class)]
    public ListingOffersRequestListSchema $requests;

    protected function pascalCase(ReflectionProperty $property): string
    {
        return Str::of($property->getName())->studly()->replace('Uri', 'uri')->replace('Method', 'method');
    }
}
