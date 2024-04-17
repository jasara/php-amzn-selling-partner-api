<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Validators;

use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\StringIsNumberValidator;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(StringIsNumberValidator::class)]
class StringIsNumberValidatorTest extends UnitTestCase
{
    public function testThrowsValidationErrorIfStringNotNumeric(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('NAN is not numeric.');

        $validator = new StringIsNumberValidator();
        $validator->validate('NAN');
    }

    public function testPassesValidation(): void
    {
        $this->expectNotToPerformAssertions();

        $validator = new StringIsNumberValidator();
        $validator->validate('123');
    }
}
