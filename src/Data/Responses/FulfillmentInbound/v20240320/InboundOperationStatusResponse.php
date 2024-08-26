<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\OperationSchema;

class InboundOperationStatusResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?OperationSchema $operation,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'operation';
    }
}
