<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerFeedbackTypeSchema extends BaseSchema
{
    public function __construct(
        public ?int $seller_positive_feedback_rating,
        public int $feedback_count,
    ) {
    }
}
