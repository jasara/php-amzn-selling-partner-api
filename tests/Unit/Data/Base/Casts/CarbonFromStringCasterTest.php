<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Casts;

use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CarbonFromStringCaster::class)]
class CarbonFromStringCasterTest extends UnitTestCase
{
    public function testCastsFromStringToCarbonImmutable(): void
    {
        $caster = new CarbonFromStringCaster();
        $carbon = $caster->cast('2021-01-01');

        $this->assertInstanceOf(\Carbon\CarbonImmutable::class, $carbon);
        $this->assertEquals('2021-01-01', $carbon->toDateString());
    }
}
