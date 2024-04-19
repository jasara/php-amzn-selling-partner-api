<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\DocumentDownloadSchema;

class GetDeliveryChallanDocumentResponse extends BaseResponse
{
    public function __construct(
        public DocumentDownloadSchema $document_download,
    ) {
    }
}
