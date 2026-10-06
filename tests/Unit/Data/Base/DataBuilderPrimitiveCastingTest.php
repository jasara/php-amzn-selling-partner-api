<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Closure;
use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Base\DataBuilder;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use LogicException;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DataBuilder::class)]
final class DataBuilderPrimitiveCastingTest extends UnitTestCase
{
    public function testPrimitiveValuesAreCastWithoutAttemptingClassAutoloading(): void
    {
        $prototype = new class(0, 0.0, '', [], false) extends Data {
            public function __construct(
                public int $quantity,
                public float $amount,
                public string $identifier,
                public array $values,
                public bool $enabled,
            ) {
            }
        };
        $autoload_guard = $this->registerPrimitiveAutoloadGuard();

        try {
            $data = $prototype::from([
                'quantity' => '12',
                'amount' => '19.95',
                'identifier' => 123,
                'values' => 'value',
                'enabled' => 1,
            ]);
        } finally {
            spl_autoload_unregister($autoload_guard);
        }

        $this->assertSame(12, $data->quantity);
        $this->assertSame(19.95, $data->amount);
        $this->assertSame('123', $data->identifier);
        $this->assertSame(['value'], $data->values);
        $this->assertTrue($data->enabled);
    }

    public function testEmptyNullableArrayRemainsNullWithoutAttemptingClassAutoloading(): void
    {
        $prototype = new class(null) extends Data {
            public function __construct(public ?array $values)
            {
            }
        };
        $autoload_guard = $this->registerPrimitiveAutoloadGuard();

        try {
            $data = $prototype::from(['values' => []]);
        } finally {
            spl_autoload_unregister($autoload_guard);
        }

        $this->assertNull($data->values);
    }

    private function registerPrimitiveAutoloadGuard(): Closure
    {
        $autoload_guard = static function (string $class_name): void {
            if (in_array($class_name, ['int', 'float', 'string', 'array', 'bool'], true)) {
                throw new LogicException('Attempted to autoload primitive type: ' . $class_name);
            }
        };
        spl_autoload_register($autoload_guard);

        return $autoload_guard;
    }
}
