<?php

namespace Jasara\AmznSPA\Traits;

use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\AmznSPAException;

trait RefreshsToken
{
    private function validateOrRefreshToken(AmznSPAConfig $config): AmznSPAConfig
    {
        $tokens = $config->getTokens();
        if (! $tokens->refresh_token) {
            throw new AmznSPAException('Refresh token has not been set on config');
        }

        if ($tokens->expires_at && $tokens->expires_at->subMinute(5)->isPast()) {
            return $this->refreshToken($config);
        }

        return $config;
    }

    private function refreshToken(AmznSPAConfig $config): AmznSPAConfig
    {
        $amazon = new AmznSPA($config);
        $new_tokens = $amazon->oauth->getAccessTokenFromRefreshToken($config->getTokens()->refresh_token);

        $config->setTokens($new_tokens);

        return $config;
    }
}
