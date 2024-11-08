<?php

namespace Jasara\AmznSPA\Data;

class Proxy
{
    public function __construct(
        public readonly string $url,
        public readonly string $auth_token,
    ) {
    }
}
