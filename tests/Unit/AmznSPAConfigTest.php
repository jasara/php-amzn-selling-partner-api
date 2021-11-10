<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DataTransferObjects\ApplicationKeysDTO;
use Jasara\AmznSPA\DataTransferObjects\AuthTokensDTO;
use Jasara\AmznSPA\DataTransferObjects\GrantlessTokenDTO;
use Jasara\AmznSPA\DataTransferObjects\RestrictedDataTokenDTO;
use Psr\Log\LogLevel;
use Symfony\Component\HttpKernel\Log\Logger;

/**
 * @covers \Jasara\AmznSPA\AmznSPAConfig
 */
class AmznSPAConfigTest extends UnitTestCase
{
    public function testGetNewConfig()
    {
        $marketplace_id = MarketplacesList::all()[rand(0, 10)]->getIdentifier();

        $application_id = $lwa_client_id = $lwa_client_secret = $aws_access_key = $aws_secret_key = '';
        $application_key_properties = ['application_id', 'lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key'];

        foreach ($application_key_properties as $property) {
            $$property = Str::random();
        }

        $redirect_url = Str::random();
        $lwa_refresh_token = Str::random();
        $lwa_access_token = Str::random();
        $lwa_access_token_expires_at = CarbonImmutable::now()->addSeconds(rand(100, 500));
        $grantless_access_token = Str::random();
        $grantless_access_token_expires_at = CarbonImmutable::now()->addSeconds(rand(100, 500));
        $restricted_data_token = Str::random();
        $restricted_data_token_expires_at = CarbonImmutable::now()->addSeconds(rand(100, 500));

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id,
            application_id: $application_id,
            redirect_url: $redirect_url,
            aws_access_key: $aws_access_key,
            aws_secret_key: $aws_secret_key,
            lwa_client_id: $lwa_client_id,
            lwa_client_secret: $lwa_client_secret,
            lwa_refresh_token: $lwa_refresh_token,
            lwa_access_token: $lwa_access_token,
            lwa_access_token_expires_at: $lwa_access_token_expires_at,
            grantless_access_token: $grantless_access_token,
            grantless_access_token_expires_at: $grantless_access_token_expires_at,
            restricted_data_token: $restricted_data_token,
            restricted_data_token_expires_at: $restricted_data_token_expires_at,
            use_test_endpoints: true,
        );

        $this->assertInstanceOf(Marketplace::class, $config->getMarketplace());
        $this->assertInstanceOf(Factory::class, $config->getHttp());
        $this->assertInstanceOf(AuthTokensDTO::class, $config->getTokens());
        $this->assertInstanceOf(ApplicationKeysDTO::class, $config->getApplicationKeys());

        foreach ($application_key_properties as $property) {
            $this->assertEquals($$property, $config->getApplicationKeys()->$property);
        }

        $this->assertEquals($marketplace_id, $config->getMarketplace()->getIdentifier());

        $tokens = $config->getTokens();
        $this->assertEquals($lwa_access_token, $tokens->access_token);
        $this->assertEquals($lwa_refresh_token, $tokens->refresh_token);
        $this->assertEquals($lwa_access_token_expires_at, $tokens->expires_at);

        $grantless_token = $config->getGrantlessToken();
        $this->assertEquals($grantless_access_token, $grantless_token->access_token);
        $this->assertEquals($grantless_access_token_expires_at, $grantless_token->expires_at);

        $restricted_data_token_data = $config->getRestrictedDataToken();
        $this->assertEquals($restricted_data_token, $restricted_data_token_data->access_token);
        $this->assertEquals($restricted_data_token_expires_at, $restricted_data_token_data->expires_at);

        $this->assertEquals($redirect_url, $config->getRedirectUrl());

        $this->assertTrue($config->shouldUseTestEndpoints());
        $this->assertTrue($config->shouldGetRdtTokens());
    }

    public function testSetters()
    {
        $marketplace = MarketplacesList::all()->random(1)->first();

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace->getIdentifier(),
            application_id: Str::random(),
        );

        $marketplace_2 = MarketplacesList::all()->random(1)->first();
        $config->setMarketplace($marketplace_2->getIdentifier());
        $this->assertEquals($marketplace_2->getIdentifier(), $config->getMarketplace()->getIdentifier());

        $config->setHttp(new Factory());

        $refresh_token = Str::random();
        $config->setTokens(new AuthTokensDTO(
            refresh_token: $refresh_token,
        ));

        $this->assertEquals($refresh_token, $config->getTokens()->refresh_token);

        $grantless_access_token = Str::random();
        $config->setGrantlessToken(new GrantlessTokenDTO(
            access_token: $grantless_access_token,
        ));

        $restricted_data_token = Str::random();
        $config->setRestrictedDataToken(new RestrictedDataTokenDTO(
            access_token: $restricted_data_token,
        ));

        $this->assertEquals($restricted_data_token, $config->getRestrictedDataToken()->access_token);

        $save_lwa_tokens_callback = function () {
            return 10;
        };
        $config->setSaveLwaTokensCallback($save_lwa_tokens_callback);

        $this->assertEquals(10, $config->getSaveLwaTokensCallback()());

        $authentication_exception_callback = function () {
            return 99;
        };
        $config->setAuthenticationExceptionCallback($authentication_exception_callback);

        $this->assertEquals(99, $config->getAuthenticationExceptionCallback()());
    }

    /**
     * @covers \Jasara\AmznSPA\AmznSPAConfig
     * @covers \Jasara\AmznSPA\AmznSPAHttp::cleanData
     */
    public function testLogger()
    {
        $http = new Factory;
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('errors/invalid-client'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setTokens(new AuthTokensDTO(
            refresh_token: Str::random(),
        ));

        $error_filepath = __DIR__ . '/../error-log.txt';
        touch($error_filepath);
        $logger_resource = fopen($error_filepath, 'rw+');
        ftruncate($logger_resource, 0);
        $logger = new Logger(LogLevel::DEBUG, $logger_resource, function (string $level, string $message, array $context) {
            $log = sprintf('[%s] %s', $level, $message);
            if (count($context)) {
                $log .= ' Context: ' . json_encode($context);
            }

            $log = str_replace(["\n", "\r"], '', $log);

            $log .= \PHP_EOL;

            return $log;
        });
        $config->setLogger($logger);

        $config->getLogger()->error('123');

        $caught = false;

        try {
            $amzn = new AmznSPA($config);
            $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
        } catch (RequestException $e) {
            $caught = true;
            rewind($logger_resource);
            $line_1 = fgets($logger_resource);
            $line_2 = fgets($logger_resource);
            $line_3 = fgets($logger_resource);

            $this->assertStringContainsString('123', $line_1);
            $this->assertStringNotContainsString('"access_token":"[filtered]"', $line_2);
            $this->assertStringContainsString('"x-amz-access-token":"[filtered]"', $line_2);
            $this->assertStringContainsString('\"error\":\"invalid_client\"', $line_3);
            $this->assertEquals('', fgets($logger_resource));
        }

        $this->assertTrue($caught);
    }

    public function testIsPropertySet()
    {
        $marketplace = MarketplacesList::all()->random(1)->first();

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace->getIdentifier(),
            application_id: Str::random(),
        );

        $this->assertFalse($config->isPropertySet('redirect_url'));

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace->getIdentifier(),
            application_id: Str::random(),
            redirect_url: Str::random(),
        );

        $this->assertTrue($config->isPropertySet('redirect_url'));
    }
}
