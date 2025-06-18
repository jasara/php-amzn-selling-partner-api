<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

enum CompetitiveSummaryIncludedData: string
{
    case FEATURED_BUYING_OPTIONS = 'FEATURED_BUYING_OPTIONS';
    case REFERENCE_PRICES = 'REFERENCE_PRICES';
    case LOWEST_PRICED_OFFERS = 'LOWEST_PRICED_OFFERS';
}