<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

enum BusinessType: string
{
    case Charity = 'CHARITY';
    case Craftsman = 'CRAFTSMAN';
    case NaturalPersonCompany = 'NATURAL_PERSON_COMPANY';
    case PublicListed = 'PUBLIC_LISTED';
    case PrivateLimited = 'PRIVATE_LIMITED';
    case SoleProprietorship = 'SOLE_PROPRIETORSHIP';
    case StateOwned = 'STATE_OWNED';
    case Individual = 'INDIVIDUAL';
}
