<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Support\Arr;
use Jasara\AmznSPA\Constants\MarketplaceData;
use Jasara\AmznSPA\Contracts\ResourceContract;

class OAuthResource implements ResourceContract
{
    public function __construct(
        private string $marketplace_id
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

    private function getBaseUrlFromMarketplace()
    {
        return Arr::get(MarketplaceData::allMarketplaces(), $this->marketplace_id . '.base_url');
    }
}
