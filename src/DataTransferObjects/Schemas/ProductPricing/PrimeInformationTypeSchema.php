<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class PrimeInformationTypeSchema extends DataTransferObject
{
    public ?bool $is_prime;

    public bool $is_national_prime;
}
