<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ReturnAuthorizationSchema extends DataTransferObject
{
    public string $return_authorization_id;

    public string $fulfillment_center_id;

    public AddressSchema $return_to_address; //change this to shipping address after merge from main.

    public string $amazon_rma_id;

    public string $rma_page_url;
}
