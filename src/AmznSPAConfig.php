<?php

namespace Jasara\AmznSPA;

use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Http\Client\Factory;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DataTransferObjects\ApplicationKeysDTO;
use Jasara\AmznSPA\DataTransferObjects\AuthTokensDTO;
use Jasara\AmznSPA\DataTransferObjects\GrantlessTokenDTO;
use Jasara\AmznSPA\DataTransferObjects\RestrictedDataTokenDTO;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Log\Logger;

class AmznSPAConfig
{
    use ValidatesParameters;

    private Factory $http;

    private AuthTokensDTO $tokens;

    private Marketplace $marketplace;

    private ApplicationKeysDTO $application_keys;

    private GrantlessTokenDTO $grantless_token;

    private RestrictedDataTokenDTO $restricted_data_token;

    private LoggerInterface $logger;

    public function __construct(
        string $marketplace_id,
        string $application_id,
        private ?string $redirect_url = null,
        private bool $use_test_endpoints = false,
        private ?bool $get_rdt_tokens = true,
        private ?Closure $save_lwa_tokens_callback = null,
        private ?Closure $authentication_exception_callback = null,
        private ?Closure $response_callback = null,
        ?LoggerInterface $logger = null,
        ?string $aws_access_key = null,
        ?string $aws_secret_key = null,
        ?string $lwa_client_id = null,
        ?string $lwa_client_secret = null,
        ?string $lwa_refresh_token = null,
        ?string $lwa_access_token = null,
        ?CarbonImmutable $lwa_access_token_expires_at = null,
        ?string $grantless_access_token = null,
        ?CarbonImmutable $grantless_access_token_expires_at = null,
        ?string $restricted_data_token = null,
        ?CarbonImmutable $restricted_data_token_expires_at = null,
    ) {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $this->http = new Factory;
        $this->tokens = new AuthTokensDTO(
            refresh_token: $lwa_refresh_token,
            access_token: $lwa_access_token,
            expires_at: $lwa_access_token_expires_at,
        );
        $this->grantless_token = new GrantlessTokenDTO(
            access_token: $grantless_access_token,
            expires_at: $grantless_access_token_expires_at,
        );
        $this->restricted_data_token = new RestrictedDataTokenDTO(
            access_token: $restricted_data_token,
            expires_at: $restricted_data_token_expires_at,
        );
        $this->marketplace = MarketplacesList::getMarketplaceById($marketplace_id);
        $this->application_keys = new ApplicationKeysDTO(
            application_id: $application_id,
            aws_access_key: $aws_access_key,
            aws_secret_key: $aws_secret_key,
            lwa_client_id: $lwa_client_id,
            lwa_client_secret: $lwa_client_secret,
        );

        $this->logger = $logger ?: new Logger();
    }

    public function getHttp(): Factory
    {
        return $this->http;
    }

    public function getTokens(): AuthTokensDTO
    {
        return $this->tokens;
    }

    public function getGrantlessToken(): GrantlessTokenDTO
    {
        return $this->grantless_token;
    }

    public function getRestrictedDataToken(): RestrictedDataTokenDTO
    {
        return $this->restricted_data_token;
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

    public function getSaveLwaTokensCallback(): Closure
    {
        return $this->save_lwa_tokens_callback;
    }

    public function getAuthenticationExceptionCallback(): Closure
    {
        return $this->authentication_exception_callback;
    }

    public function getResponseCallback(): Closure
    {
        return $this->response_callback;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function shouldUseTestEndpoints(): bool
    {
        return $this->use_test_endpoints;
    }

    public function shouldGetRdtTokens(): bool
    {
        return $this->get_rdt_tokens;
    }

    public function setHttp(Factory $http): void
    {
        $this->http = $http;
    }

    public function setTokens(AuthTokensDTO $tokens): void
    {
        $this->tokens = $tokens;
    }

    public function setRestrictedDataToken(RestrictedDataTokenDTO $token): void
    {
        $this->restricted_data_token = $token;
    }

    public function setGrantlessToken(GrantlessTokenDTO $token): void
    {
        $this->grantless_token = $token;
    }

    public function setSaveLwaTokensCallback(Closure $callback): void
    {
        $this->save_lwa_tokens_callback = $callback;
    }

    public function setAuthenticationExceptionCallback(Closure $callback): void
    {
        $this->authentication_exception_callback = $callback;
    }

    public function setResponseCallback(Closure $callback): void
    {
        $this->response_callback = $callback;
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
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
