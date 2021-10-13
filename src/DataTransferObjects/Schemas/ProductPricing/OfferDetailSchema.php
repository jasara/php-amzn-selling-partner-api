<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class OfferDetailSchema extends DataTransferObject
{
    public ?bool $my_offer;

    public ?OfferCustomerTypeSchema $offer_type;

    public string $sub_condition;

    public ?string $seller_id;

    public ?string $condition_notes;

    public ?SellerFeedbackTypeSchema $seller_feedback_rating;

    public DetailedShippingTimeTypeSchema $shipping_time;

    public MoneyTypeSchema $listing_price;

    public ?QuantityDiscountPriceTypeSchema $quantity_discount_prices;

    public ?PointsSchema $points;

    public MoneyTypeSchema $shipping;

    public ?ShipsFromTypeShema $ships_from;

    public bool $is_fulfilled_by_amazon;

    public ?PrimeInformationTypeSchema $prime_information;

    public ?bool $is_buyBox_winner;

    public ?bool $is_featured_merchant;
}
