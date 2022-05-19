<?php

namespace Jasara\AmznSPA\Enums\CatalogItems;

enum ItemIdentifierTypes: string
{
    case ASIN = 'ASIN';
    case EAN = 'EAN';
    case GTIN = 'GTIN';
    case ISBN = 'ISBN';
    case JAN = 'JAN';
    case MINSAN = 'MINSAN';
    case SKU = 'SKU';
    case UPC = 'UPC';
}
