<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers;

use Spatie\DataTransferObject\DataTransferObject;

class ParticipationSchema extends DataTransferObject
{
    public bool $is_participating;

    public bool $has_suspended_listings;
}
