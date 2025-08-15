<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

enum CompetitiveSummaryIncludedData: string
{
    case FeaturedBuyingOptions = 'featuredBuyingOptions';
    case ReferencePrices = 'referencePrices';
    case LowestPricedOffers = 'lowestPricedOffers';
}
