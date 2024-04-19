<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

use Attribute;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Jasara\AmznSPA\Data\Base\Validators\Validator as Contract;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE | Attribute::TARGET_PARAMETER)]
class RuleValidator implements Contract
{
    public function __construct(
        private array $rules,
    ) {
    }

    public function validate(mixed $value): void
    {
        if (is_null($value)) {
            return;
        }

        $validator = new Factory(new Translator(
            new FileLoader(new Filesystem, __DIR__ . '/../../../../vendor/illuminate/translation/lang'),
            'en'
        ));

        $validator = $validator->make([
            'value' => $value,
        ], [
            'value' => $this->rules,
        ]);

        if ($validator->fails()) {
            throw new DataValidationException('Invalid value: ' . $value . ', errors: ' . implode(',', $validator->errors()->get('value')));
        }
    }
}
