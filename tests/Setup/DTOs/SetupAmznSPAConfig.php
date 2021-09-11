<?php

namespace Tests\Setup\DTOs;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\AmznSPAConfig;

trait SetupAmznSPAConfig
{
    public function setupMinimalConfig(string $marketplace_id = null)
    {
        return new AmznSPAConfig(
            marketplace_id: $marketplace_id ?: Str::random(),
            application_id: Str::random(),
        );
    }
}
