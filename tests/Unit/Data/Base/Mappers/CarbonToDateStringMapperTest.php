<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Mappers;

use Jasara\AmznSPA\Data\Base\Mappers\CarbonToDateStringMapper;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CarbonToDateStringMapper::class)]
class CarbonToDateStringMapperTest extends UnitTestCase
{
    public function testMapCarbonToDateString(): void
    {
        $mapper = new CarbonToDateStringMapper();
        $result = $mapper->map(\Carbon\Carbon::parse('2021-01-01'));

        $this->assertEquals('2021-01-01', $result);
    }

    public function testThrowsExceptionIfNotCarbon(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $mapper = new CarbonToDateStringMapper();
        $mapper->map('2021-01-01');
    }

    public function testReturnsNullIfNull(): void
    {
        $mapper = new CarbonToDateStringMapper();
        $result = $mapper->map(null);

        $this->assertNull($result);
    }
}
