<?php

namespace Jasara\AmznSPA;

use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Data\ApplicationKeys;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Data\GrantlessToken;
use Jasara\AmznSPA\Data\Proxy;
use Jasara\AmznSPA\Data\RestrictedDataToken;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Log\Logger;

class AmznSPAConfig
{
    use ValidatesParameters;
    private PendingRequest $http;
    private AuthTokens $tokens;
    private Marketplace $marketplace;
    private ApplicationKeys $application_keys;
    private GrantlessToken $grantless_token;
    private RestrictedDataToken $restricted_data_token;
    private LoggerInterface $logger;
    private ?Proxy $proxy;

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
        ?Proxy $proxy = null
    ) {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $this->http = (new Factory())->connectTimeout(10);
        $this->tokens = new AuthTokens(
            refresh_token: $lwa_refresh_token,
            access_token: $lwa_access_token,
            expires_at: $lwa_access_token_expires_at,
        );
        $this->grantless_token = new GrantlessToken(
            access_token: $grantless_access_token,
            expires_at: $grantless_access_token_expires_at,
        );
        $this->restricted_data_token = new RestrictedDataToken(
            access_token: $restricted_data_token,
            expires_at: $restricted_data_token_expires_at,
            path: null,
        );
        $this->marketplace = MarketplacesList::getMarketplaceById($marketplace_id);
        $this->application_keys = new ApplicationKeys(
            application_id: $application_id,
            aws_access_key: $aws_access_key,
            aws_secret_key: $aws_secret_key,
            lwa_client_id: $lwa_client_id,
            lwa_client_secret: $lwa_client_secret,
        );

        $this->logger = $logger ?: new Logger();
        $this->proxy = $proxy;
    }

    public function getHttp(): PendingRequest
    {
        return clone $this->http;
    }

    public function getTokens(): AuthTokens
    {
        return $this->tokens;
    }

    public function getGrantlessToken(): GrantlessToken
    {
        return $this->grantless_token;
    }

    public function getRestrictedDataToken(): RestrictedDataToken
    {
        return $this->restricted_data_token;
    }

    public function getMarketplace(): Marketplace
    {
        return $this->marketplace;
    }

    public function getApplicationKeys(): ApplicationKeys
    {
        return $this->application_keys;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirect_url;
    }

    public function getSaveLwaTokensCallback(): ?Closure
    {
        return $this->save_lwa_tokens_callback;
    }

    public function getAuthenticationExceptionCallback(): ?Closure
    {
        return $this->authentication_exception_callback;
    }

    public function getResponseCallback(): ?Closure
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

    public function getProxy(): Proxy|null
    {
        return $this->proxy;
    }

    public function shouldGetRdtTokens(): bool
    {
        return $this->get_rdt_tokens;
    }

    public function setHttp(Factory|PendingRequest $http): void
    {
        if ($http instanceof Factory) {
            $this->http = $http->connectTimeout(30);

            return;
        }

        $this->http = $http;
    }

    public function setTokens(AuthTokens $tokens): void
    {
        $this->tokens = $tokens;
    }

    public function setRestrictedDataToken(RestrictedDataToken $token): void
    {
        $this->restricted_data_token = $token;
    }

    public function setGrantlessToken(GrantlessToken $token): void
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

    public function setGetRdtTokens(bool $value): void
    {
        $this->get_rdt_tokens = $value;
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
