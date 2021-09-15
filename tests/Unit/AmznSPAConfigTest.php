<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;

/**
 * @coversDefaultClass \Jasara\AmznSPA\AmznSPAConfig
 */
class AmznSPAConfigTest extends UnitTestCase
{
    /**
     * @covers ::__construct
     */
    public function testGetNewConfig()
    {
        $marketplace_id = $application_id = $redirect_url = $lwa_client_id = $lwa_client_secret = $lwa_refresh_token = $lwa_access_token = '';
        $string_properties = ['marketplace_id', 'application_id', 'redirect_url', 'lwa_client_id', 'lwa_client_secret', 'lwa_refresh_token', 'lwa_access_token'];
        foreach ($string_properties as $property) {
            $$property = Str::random();
        }

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id,
            application_id: $application_id,
            redirect_url: $redirect_url,
            lwa_client_id: $lwa_client_id,
            lwa_client_secret: $lwa_client_secret,
            lwa_refresh_token: $lwa_refresh_token,
            lwa_access_token: $lwa_access_token,
        );

        foreach ($string_properties as $property) {
            $this->assertEquals($$property, $config->$property);
        }

        $this->assertInstanceOf(Factory::class, $config->http);
    }
}
