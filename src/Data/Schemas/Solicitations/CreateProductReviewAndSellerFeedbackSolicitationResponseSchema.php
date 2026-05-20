<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Solicitations;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateProductReviewAndSellerFeedbackSolicitationResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ErrorListSchema $errors = null,
    ) {}
}
