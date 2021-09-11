<?php

namespace Jasara\AmznSPA;

use Jasara\AmznSPA\DTOs\AmznSPAConfig;
use Jasara\AmznSPA\Traits\HasConfig;

class AmznSPA
{
    use HasConfig;

    public function __construct(AmznSPAConfig $config)
    {
        $this->setupConfig($config);
    }
}
