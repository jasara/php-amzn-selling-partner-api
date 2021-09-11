<?php

namespace Tests\Setup\DTOs;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\AmznSPAConfig;

trait SetupAmznSPAConfig
{
    public function setupMinimalConfig()
    {
        return new AmznSPAConfig(
            marketplace_id: Str::random(),
            application_id: Str::random(),
        );
    }
}
