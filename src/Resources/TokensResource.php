<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Tokens\CreateRestrictedDataTokenRequest;
use Jasara\AmznSPA\Data\Responses\Tokens\CreateRestrictedDataTokenResponse;

class TokensResource implements ResourceContract
{
    public const BASE_PATH = '/tokens/2021-03-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function createRestrictedDataToken(CreateRestrictedDataTokenRequest $request): CreateRestrictedDataTokenResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'restrictedDataToken', (array) $request->toArrayObject());

        return new CreateRestrictedDataTokenResponse($response);
    }
}
