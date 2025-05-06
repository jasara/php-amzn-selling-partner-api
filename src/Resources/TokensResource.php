<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Tokens\CreateRestrictedDataTokenRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Tokens\CreateRestrictedDataTokenResponse;

class TokensResource implements ResourceContract
{
    public const BASE_PATH = '/tokens/2021-03-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function createRestrictedDataToken(CreateRestrictedDataTokenRequest $request): CreateRestrictedDataTokenResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateRestrictedDataTokenResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'restrictedDataToken',
                deep_array_conversion($request->toArrayObject()),
            );

        return CreateRestrictedDataTokenResponse::from($response);
    }
}
