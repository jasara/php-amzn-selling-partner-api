<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Dotenv\Dotenv;
use Jasara\AmznSPA\Tests\Setup\SetupAmznSPAConfig;
use Jasara\AmznSPA\Tests\Setup\SetupContainers;
use Jasara\AmznSPA\Tests\Setup\SetupMerchantFulfillmentRequest;
use Jasara\AmznSPA\Tests\Setup\SetupSchemas;
use PHPUnit\Framework\TestCase;

class UnitTestCase extends TestCase
{
    use SetupAmznSPAConfig;
    use SetupSchemas;
    use SetupMerchantFulfillmentRequest;
    use SetupContainers;

    public function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__.'/../..');
        $dotenv->safeLoad();

        ray()->clearAll();
    }
}
