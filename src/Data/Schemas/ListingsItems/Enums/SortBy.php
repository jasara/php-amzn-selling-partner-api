<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems\Enums;

enum SortBy: string
{
    case SKU = 'sku';
    case CREATED_DATE = 'createdDate';
    case LAST_UPDATED_DATE = 'lastUpdatedDate';
}