<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum OwnerConstraint: string
{
    case AmazonOnly = 'AMAZON_ONLY';
    case SellerOnly = 'SELLER_ONLY';
    case NoneOnly = 'NONE_ONLY';
}
