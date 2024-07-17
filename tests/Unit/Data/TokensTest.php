<?php

namespace Jasara\AmznSPA\Tests\Unit\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Data\GrantlessToken;
use Jasara\AmznSPA\Data\RestrictedDataToken;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AuthTokens::class)]
#[CoversClass(GrantlessToken::class)]
#[CoversClass(RestrictedDataToken::class)]
class TokensTest extends UnitTestCase
{
    public function testSetupTokens()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_in = rand(500, 5000);

        $auth_tokens = new AuthTokens(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_in,
        );

        $this->assertEquals($access_token, $auth_tokens->access_token);
        $this->assertEquals($refresh_token, $auth_tokens->refresh_token);
        $this->assertEqualsWithDelta($expires_in, $auth_tokens->expires_at->diffInSeconds(CarbonImmutable::now(), true), 2);

        $grantless_token = new GrantlessToken(
            access_token: $access_token,
            expires_at: $expires_in,
        );

        $this->assertEquals($access_token, $grantless_token->access_token);
        $this->assertEqualsWithDelta($expires_in, $grantless_token->expires_at->diffInSeconds(CarbonImmutable::now(), true), 2);

        $restricted_data_token = new RestrictedDataToken(
            access_token: $access_token,
            path: '/bearer',
            expires_at: $expires_in,
        );

        $this->assertEquals($access_token, $restricted_data_token->access_token);
        $this->assertEquals('/bearer', $restricted_data_token->path);
        $this->assertEqualsWithDelta($expires_in, $restricted_data_token->expires_at->diffInSeconds(CarbonImmutable::now(), absolute: true), 2);
    }

    public function testSetupTokensWithExistingDate()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_at = CarbonImmutable::now()->addSeconds(rand(100, 500));

        $auth_tokens = new AuthTokens(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $auth_tokens->access_token);
        $this->assertEquals($refresh_token, $auth_tokens->refresh_token);
        $this->assertEquals($expires_at, $auth_tokens->expires_at);

        $grantless_token = new GrantlessToken(
            access_token: $access_token,
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $grantless_token->access_token);
        $this->assertEquals($expires_at, $grantless_token->expires_at);

        $restricted_data_token = new RestrictedDataToken(
            access_token: $access_token,
            path: '/bearer',
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $restricted_data_token->access_token);
        $this->assertEquals('/bearer', $restricted_data_token->path);
        $this->assertEquals($expires_at, $restricted_data_token->expires_at);
    }

    public function testSetupTokensWithNoExpiry()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_at = null;

        $auth_tokens = new AuthTokens(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $auth_tokens->access_token);
        $this->assertEquals($refresh_token, $auth_tokens->refresh_token);
        $this->assertEquals($expires_at, $auth_tokens->expires_at);

        $grantless_token = new GrantlessToken(
            access_token: $access_token,
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $grantless_token->access_token);
        $this->assertNull($grantless_token->expires_at);

        $restricted_data_token = new RestrictedDataToken(
            access_token: $access_token,
            path: '/bearer',
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $restricted_data_token->access_token);
        $this->assertEquals('/bearer', $restricted_data_token->path);
        $this->assertNull($restricted_data_token->expires_at);
    }
}
