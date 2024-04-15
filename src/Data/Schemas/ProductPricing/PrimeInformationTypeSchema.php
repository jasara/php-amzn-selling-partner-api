<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class PrimeInformationTypeSchema extends DataTransferObject
{
    public ?bool $is_prime;

    public bool $is_national_prime;
}
