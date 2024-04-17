<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Validators;

use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(StringEnumValidator::class)]
class StringEnumValidatorTest extends UnitTestCase
{
    public function testThrowsValidationErrorIfStringNotInArray(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('INVALID is not an allowed result. Valid values are: InboundRecommended,InboundNotRecommended');

        $validator = new StringEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate('INVALID');
    }

    public function testPassesIfNull(): void
    {
        $this->expectNotToPerformAssertions();

        $validator = new StringEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate(null);
    }

    public function testPassesValidation(): void
    {
        $this->expectNotToPerformAssertions();

        $validator = new StringEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate('InboundRecommended');
    }
}
