<?php

namespace Jasara\AmznSPA;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Factory;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DTOs\ApplicationKeysDTO;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class AmznSPAConfig
{
    use ValidatesParameters;

    private Factory $http;

    private AuthTokensDTO $tokens;

    private Marketplace $marketplace;

    private ApplicationKeysDTO $application_keys;

    public function __construct(
        string $marketplace_id,
        string $application_id,
        private ?string $redirect_url = null,
        ?string $aws_access_key = null,
        ?string $aws_secret_key = null,
        ?string $lwa_client_id = null,
        ?string $lwa_client_secret = null,
        ?string $lwa_refresh_token = null,
        ?string $lwa_access_token = null,
        ?CarbonImmutable $lwa_access_token_expires_at = null,
    ) {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $this->http = new Factory(new HttpEventHandler);
        $this->tokens = new AuthTokensDTO(
            refresh_token: $lwa_refresh_token,
            access_token: $lwa_access_token,
            expires_at: $lwa_access_token_expires_at,
        );
        $this->marketplace = MarketplacesList::getMarketplaceById($marketplace_id);
        $this->application_keys = new ApplicationKeysDTO(
            application_id: $application_id,
            aws_access_key: $aws_access_key,
            aws_secret_key: $aws_secret_key,
            lwa_client_id: $lwa_client_id,
            lwa_client_secret: $lwa_client_secret,
        );
    }

    public function getHttp(): Factory
    {
        return $this->http;
    }

    public function getTokens(): AuthTokensDTO
    {
        return $this->tokens;
    }

    public function getMarketplace(): Marketplace
    {
        return $this->marketplace;
    }

    public function getApplicationKeys(): ApplicationKeysDTO
    {
        return $this->application_keys;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirect_url;
    }

    public function setHttp(Factory $http): void
    {
        $this->http = $http;
    }

    public function setTokens(AuthTokensDTO $tokens): void
    {
        $this->tokens = $tokens;
    }

    public function setMarketplace(string $marketplace_id): void
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $this->marketplace = MarketplacesList::getMarketplaceById($marketplace_id);
    }

    public function isPropertySet(string $property): bool
    {
        return isset($this->$property) && ! is_null($this->$property);
    }
}
