<?php

namespace Jasara\AmznSPA\Tests\Unit\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AuthTokens::class)]
class AuthTokensTest extends UnitTestCase
{
    public function testSetupTokens()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_in = rand(500, 5000);

        $dto = new AuthTokens(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_in,
        );

        $this->assertEquals($access_token, $dto->access_token);
        $this->assertEquals($refresh_token, $dto->refresh_token);
        $this->assertEqualsWithDelta($expires_in, $dto->expires_at->diffInSeconds(CarbonImmutable::now()), 2);
    }

    public function testSetupTokensWithExistingDate()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_at = CarbonImmutable::now()->addSeconds(rand(100, 500));

        $dto = new AuthTokens(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_at,
        );

        $this->assertEquals($access_token, $dto->access_token);
        $this->assertEquals($refresh_token, $dto->refresh_token);
        $this->assertEquals($expires_at, $dto->expires_at);
    }
}
