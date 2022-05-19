<?php

namespace Jasara\AmznSPA\Enums\CatalogItems;

enum ItemRelationshipType: string
{
    case VARIATION = 'VARIATION';
    case PACKAGE_HIERARCHY = 'PACKAGE_HIERARCHY';
}
