<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class SellerFeedbackTypeSchema extends DataTransferObject
{
    public ?int $seller_positive_feedback_rating;

    public int $feedback_count;
}
