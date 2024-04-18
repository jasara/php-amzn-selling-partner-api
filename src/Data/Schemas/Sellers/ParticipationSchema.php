<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ParticipationSchema extends BaseSchema
{
    public function __construct(
        public bool $is_participating,
        public bool $has_suspended_listings,
    ) {
    }
}
