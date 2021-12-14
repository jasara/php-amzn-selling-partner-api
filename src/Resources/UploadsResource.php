<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\Uploads\CreateUploadDestinationResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class UploadsResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/uploads/2020-11-01/uploadDestinations/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function createUploadDestinationForResource(array $marketplace_ids, string $content_md5, string $resource, ?string $content_type = null): CreateUploadDestinationResponse
    {
        $response = $this->http->post(
            $this->endpoint . self::BASE_PATH . $resource,
            array_filter([
                'marketplaceIds' => $marketplace_ids,
                'contentMD5' => $content_md5,
                'contentType' => $content_type,
            ]),
        );

        return new CreateUploadDestinationResponse($response);
    }
}
