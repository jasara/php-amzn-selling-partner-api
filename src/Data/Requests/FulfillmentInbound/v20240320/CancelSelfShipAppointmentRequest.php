<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ReasonComment;

class CancelSelfShipAppointmentRequest extends BaseRequest
{
    public function __construct(
        public ReasonComment $reason_comment,
    ) {
    }
}
