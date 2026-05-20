<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Solicitations;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SolicitationsActionSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
    ) {}
}
