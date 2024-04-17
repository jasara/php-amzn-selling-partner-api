<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base\Validators;

use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(StringArrayEnumValidator::class)]
class StringArrayEnumValidatorTest extends UnitTestCase
{
    public function testThrowsValidationErrorIfStringNotInArray(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('INVALID is not an allowed result. Valid values are: InboundRecommended,InboundNotRecommended');

        $validator = new StringArrayEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate(['INVALID', 'InboundRecommended']);
    }

    public function testThrowsValidationErrorIfNull(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('Value cannot be null');

        $validator = new StringArrayEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate(null);
    }

    public function testPassesValidation(): void
    {
        $this->expectNotToPerformAssertions();

        $validator = new StringArrayEnumValidator(['InboundRecommended', 'InboundNotRecommended']);
        $validator->validate(['InboundRecommended', 'InboundNotRecommended']);
    }
}
