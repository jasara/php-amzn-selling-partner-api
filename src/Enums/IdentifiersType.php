<?php

namespace Jasara\AmznSPA\Enums;

enum IdentifiersType: string
{
    case ASIN = 'ASIN';
    case EAN = 'EAN';
    case FNSKU = 'FNSKU';
    case GTIN = 'GTIN';
    case ISBN = 'ISBN';
    case JAN = 'JAN';
    case MINSAN = 'MINSAN';
    case SKU = 'SKU';
    case UPC = 'UPC';
}