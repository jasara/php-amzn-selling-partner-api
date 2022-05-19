<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Dotenv\Dotenv;
use Jasara\AmznSPA\Tests\Setup\SetupAmznSPAConfig;
use Jasara\AmznSPA\Tests\Setup\SetupSchemas;
use Jasara\AmznSPA\Tests\Setup\TestsRequests;
use PHPUnit\Framework\TestCase;

class UnitTestCase extends TestCase
{
    use SetupAmznSPAConfig;
    use SetupSchemas;
    use TestsRequests;

    public function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->safeLoad();

        ray()->clearAll();
    }
}
