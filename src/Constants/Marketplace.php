<?php

namespace Jasara\AmznSPA\Constants;

class Marketplace
{
    private string $base_url;

    public function __construct(
        private string $identifier,
        private string $country_code,
        private string $seller_central_url,
        private string $region,
    ) {
        $this->base_url = $this->baseUrlFromRegion($region);
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getSellerCentralUrl(): string
    {
        return $this->seller_central_url;
    }

    public function getBaseUrl(): string
    {
        return $this->base_url;
    }

    public function getAwsRegion()
    {
        return match ($this->region) {
            'NA' => 'us-east-1',
            'EU' => 'eu-west-1',
            'FE' => 'us-west-2',
            default => throw new \InvalidArgumentException('Invalid region'),
        };
    }

    private function baseUrlFromRegion(string $region): string
    {
        return match ($region) {
            'NA' => 'https://sellingpartnerapi-na.amazon.com',
            'EU' => 'https://sellingpartnerapi-eu.amazon.com',
            'FE' => 'https://sellingpartnerapi-fe.amazon.com',
            default => throw new \InvalidArgumentException('Invalid region'),
        };
    }
}
