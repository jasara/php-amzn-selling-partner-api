<?php

namespace Jasara\AmznSPA\Data;

use Jasara\AmznSPA\Data\Base\Data;

class Proxy extends Data
{
    public function __construct(
        public ?string $url,
        public ?string $auth_token,
    ) {
    }
}
