<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Jasara\AmznSPA\Constants\MarketplaceData;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;

class OAuthResource implements ResourceContract
{
    public function __construct(
        private string $marketplace_id,
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

    public function getTokensFromRedirect(array $parameters): array
    {
        if (! array_key_exists('spapi_oauth_code', $parameters)) {
            throw new InvalidParametersException('The OAuth code was not passed as a parameter');
        }

        $response = Http::post('https://api.amazon.com/auth/o2/token', [
            'grant_type' => 'authorization_code',
            'code' => $parameters['spapi_oauth_code'],
            'redirect_uri' => '?',
            'client_id' => $this->lwa_client_id,
            'client_secret' => $this->lwa_client_secret,
        ]);

        return $response->json();
    }

    public function isRedirectValid(string $original_state, array $parameters): bool
    {
        if (! array_key_exists('state', $parameters)) {
            throw new InvalidParametersException('State was not passed as a parameter');
        }

        if ($original_state && $original_state === $parameters['state']) {
            return true;
        }

        return false;
    }

    private function getBaseUrlFromMarketplace()
    {
        return Arr::get(MarketplaceData::allMarketplaces(), $this->marketplace_id . '.base_url');
    }
}
