<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

enum ItemRelationshipType: string
{
    case VARIATION = 'VARIATION';
    case PACKAGE_HIERARCHY = 'PACKAGE_HIERARCHY';
}
