<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum ShippingSolution: string
{
    case AmazonPartneredCarrier = 'AMAZON_PARTNERED_CARRIER';
    case UseYourOwnCarrier = 'USE_YOUR_OWN_CARRIER';
}
