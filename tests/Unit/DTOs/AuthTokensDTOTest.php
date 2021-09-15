<?php

namespace Jasara\AmznSPA\Tests\Unit\DTOs;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class AuthTokensDTOTest extends UnitTestCase
{
    /**
     * @covers \Jasara\AmznSPA\DTOs\AuthTokensDTO
     * @covers \Jasara\AmznSPA\DTOs\Casts\CarbonFromSecondsCaster
     */
    public function testSetupDTO()
    {
        $access_token = Str::random();
        $refresh_token = Str::random();
        $expires_in = rand(500, 5000);

        $dto = new AuthTokensDTO(
            access_token: $access_token,
            refresh_token: $refresh_token,
            expires_at: $expires_in,
        );

        $this->assertEquals($access_token, $dto->access_token);
        $this->assertEquals($refresh_token, $dto->refresh_token);
    }
}
