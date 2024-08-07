<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum DestinationType: string
{
    case AmazonOptimized = 'AMAZON_OPTIMIZED';
    case AmazonWarehouse = 'AMAZON_WAREHOUSE';
}
