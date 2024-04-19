<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum DocumentDownloadType: string
{
    case Url = 'URL';
    case PdfBase64 = 'PDF_BASE64';
}
