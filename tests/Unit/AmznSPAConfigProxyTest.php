<?php

namespace Jasara\AmznSPA\Tests\Unit;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Data\ApplicationKeys;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Data\GrantlessToken;
use Jasara\AmznSPA\Data\Proxy;
use Jasara\AmznSPA\Data\RestrictedDataToken;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use PHPUnit\Framework\Attributes\CoversClass;
use Psr\Log\LogLevel;
use Symfony\Component\HttpKernel\Log\Logger;

#[CoversClass(AmznSPAConfig::class)]
#[CoversClass(ApplicationKeys::class)]
class AmznSPAConfigProxyTest extends UnitTestCase
{
    public function testGetNewConfig()
    {
        $marketplace_id = MarketplacesList::all()[rand(0, 10)]->getIdentifier();

        $application_id = Str::random();

        $proxy_url = Str::random();
        $proxy_auth_token = Str::random();

        $config = new AmznSPAConfig(
            marketplace_id: $marketplace_id,
            application_id: $application_id,
            proxy: new Proxy(
                url: $proxy_url,
                auth_token: $proxy_auth_token
            )
        );

        $this->assertInstanceOf(Marketplace::class, $config->getMarketplace());
        $this->assertInstanceOf(PendingRequest::class, $config->getHttp());

        $this->assertEquals($marketplace_id, $config->getMarketplace()->getIdentifier());

        $this->assertTrue($config->shouldUseProxy());
        $this->assertEquals($proxy_url, $config->getProxyUrl());
        $this->assertEquals($proxy_auth_token, $config->getProxyAuthToken());
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
        $this->assertInstanceOf(PendingRequest::class, $config->getHttp());

        $config->setHttp((new Factory())->connectTimeout(30));
        $this->assertInstanceOf(PendingRequest::class, $config->getHttp());

        $proxy_url = Str::random();
        $proxy_auth_token = Str::random();
        $config->setProxy(Proxy::from(
            url: $proxy_url,
            auth_token: $proxy_auth_token
        ));

        $this->assertEquals($proxy_url, $config->getProxyUrl());
        $this->assertEquals($proxy_auth_token, $config->getProxyAuthToken());

        $proxy_url = Str::random();
        $config->setProxyUrl($proxy_url);

        $this->assertEquals($proxy_url, $config->getProxyUrl());

        $proxy_auth_token = Str::random();
        $config->setProxyAuthToken($proxy_auth_token);

        $this->assertEquals($proxy_auth_token, $config->getProxyAuthToken());
    }
}
