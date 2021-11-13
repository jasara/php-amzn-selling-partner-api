<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\ShippingAddressSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ReturnAuthorizationSchema extends DataTransferObject
{
    public string $return_authorization_id;

    public string $fulfillment_center_id;

    public ShippingAddressSchema $return_to_address;

    public string $amazon_rma_id;

    public string $rma_page_url;
}
