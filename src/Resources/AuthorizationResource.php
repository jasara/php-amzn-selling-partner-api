<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetAuthorizationCodeResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class AuthorizationResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/authorization/v1/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    /**
     * @param string $seller_id      The ID of the Amazon Seller account you are migrating. Example: ALIAL2F68A1
     * @param string $developer_id   The MWS Developer ID, example: 234355811155
     * @param string $mws_auth_token The MWS Auth Token of the Amazon Seller account you are migrating. Example: amzn.mws.2342-1235-1232...
     */
    public function getAuthorizationCodeFromMwsToken(string $seller_id, string $developer_id, string $mws_auth_token): GetAuthorizationCodeResponse
    {
        $response = $this->http
            ->responseClass(GetAuthorizationCodeResponse::class)
            ->getGrantless($this->endpoint . self::BASE_PATH . 'authorizationCode', [
                'sellingPartnerId' => $seller_id,
                'developerId' => $developer_id,
                'mwsAuthToken' => $mws_auth_token,
            ]);

        return $response;
    }
}
