<?php

namespace Jasara\AmznSPA\Enums;

enum SortBy: string
{
    case SKU = 'sku';
    case CREATED_DATE = 'createdDate';
    case LAST_UPDATED_DATE = 'lastUpdatedDate';
}