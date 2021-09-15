<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Http\Client\Factory;
use Illuminate\Support\Arr;
use Jasara\AmznSPA\Constants\MarketplaceData;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Traits\HandlesHttpErrors;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class OAuthResource implements ResourceContract
{
    use ValidatesParameters, HandlesHttpErrors;

    public function __construct(
        private Factory $http,
        private string $marketplace_id,
        private string $redirect_url,
        private string $lwa_client_id,
        private string $lwa_client_secret,
    ) {
    }

    public function getAuthUrl(?string $redirect_url = null, ?string $state = null): string
    {
        $params = http_build_query(compact('redirect_url', 'state'));
        $url = $this->getBaseUrlFromMarketplace() . '/apps/authorize/consent';

        if ($params) {
            $url .= '?' . $params;
        }

        return $url;
    }

    /**
     * @param array $parameters Array containing the data sent by Amazon on the redirect
     *      $parameters = [
     *          'state'             => (string) Required, should match the original state that was sent to Amazon
     *          'spapi_oauth_code'  => (string) Required, the authorization code
     *      ]
     */
    public function getTokensFromRedirect(string $original_state, array $parameters): AuthTokensDTO
    {
        $this->validateArrayParameters($parameters, ['state', 'spapi_oauth_code']);

        if (! $this->isRedirectValid($original_state, $parameters['state'])) {
            throw new AmznSPAException('State returned from Amazon does not match the original state');
        }

        return $this->callGetTokens($parameters['spapi_oauth_code']);
    }

    private function callGetTokens(string $spapi_oauth_code): AuthTokensDTO
    {
        $response = $this->http->post('https://api.amazon.com/auth/o2/token', [
            'grant_type' => 'authorization_code',
            'code' => $spapi_oauth_code,
            'redirect_uri' => $this->redirect_url,
            'client_id' => $this->lwa_client_id,
            'client_secret' => $this->lwa_client_secret,
        ]);

        if (! $response->ok()) {
            $this->handleError($response);
        }

        $data = $response->json();

        return new AuthTokensDTO(
            access_token: $data['access_token'],
            refresh_token: $data['refresh_token'],
            expires_at: $data['expires_in'],
        );
    }

    private function isRedirectValid(string $original_state, string $amzn_state): bool
    {
        if ($original_state === $amzn_state) {
            return true;
        }

        return false;
    }

    private function getBaseUrlFromMarketplace()
    {
        return Arr::get(MarketplaceData::allMarketplaces(), $this->marketplace_id . '.base_url');
    }
}
