<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

enum FulfillmentType: string
{
    case AFN = 'AFN';
    case MFN = 'MFN';
}