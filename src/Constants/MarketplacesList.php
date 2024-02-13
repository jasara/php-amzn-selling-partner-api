<?php

namespace Jasara\AmznSPA\Constants;

use Illuminate\Support\Collection;

class MarketplacesList
{
    public static function all(): Collection
    {
        return collect([
            new Marketplace(
                identifier: 'A2Q3Y263D00KWC',
                country_code: 'BR',
                seller_central_url: 'https://sellercentral.amazon.com.br',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A2EUQ1WTGCTBG2',
                country_code: 'CA',
                seller_central_url: 'https://sellercentral.amazon.ca',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A1AM78C64UM0Y8',
                country_code: 'MX',
                seller_central_url: 'https://sellercentral.amazon.com.mx',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'ATVPDKIKX0DER',
                country_code: 'US',
                seller_central_url: 'https://sellercentral.amazon.com',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A2VIGQ35RCS4UG',
                country_code: 'AE',
                seller_central_url: 'https://sellercentral.amazon.ae',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1PA6795UKMFR9',
                country_code: 'DE',
                seller_central_url: 'https://sellercentral-europe.amazon.com',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'ARBP9OOSHTCHU',
                country_code: 'EG',
                seller_central_url: 'https://sellercentral.amazon.eg',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1RKKUPIHCS9HS',
                country_code: 'ES',
                seller_central_url: 'https://sellercentral-europe.amazon.com',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A13V1IB3VIYZZH',
                country_code: 'FR',
                seller_central_url: 'https://sellercentral-europe.amazon.com',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1F83G8C2ARO7P',
                country_code: 'GB',
                seller_central_url: 'https://sellercentral-europe.amazon.com',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A21TJRUUN4KGV',
                country_code: 'IN',
                seller_central_url: 'https://sellercentral.amazon.in',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'APJ6JRA9NG5V4',
                country_code: 'IT',
                seller_central_url: 'https://sellercentral-europe.amazon.com',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1805IZSGTT6HS',
                country_code: 'NL',
                seller_central_url: 'https://sellercentral.amazon.nl',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1C3SOZRARQ6R3',
                country_code: 'PL',
                seller_central_url: 'https://sellercentral.amazon.pl',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A17E79C6D8DWNP',
                country_code: 'SA',
                seller_central_url: 'https://sellercentral.amazon.com.sa',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A2NODRKZP88ZB9',
                country_code: 'SE',
                seller_central_url: 'https://sellercentral.amazon.se',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A33AVAJ2PDY3EV',
                country_code: 'TR',
                seller_central_url: 'https://sellercentral.amazon.com.tr',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'AMEN7PMS3EDWL',
                country_code: 'BE',
                seller_central_url: 'https://sellercentral.amazon.com.be',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A19VAU5U5O7RUS',
                country_code: 'SG',
                seller_central_url: 'https://sellercentral.amazon.sg',
                region: 'FE',
            ),
            new Marketplace(
                identifier: 'A39IBJ37TRP1C6',
                country_code: 'AU',
                seller_central_url: 'https://sellercentral.amazon.com.au',
                region: 'FE',
            ),
            new Marketplace(
                identifier: 'A1VC38T7YXB528',
                country_code: 'JP',
                seller_central_url: 'https://sellercentral.amazon.co.jp',
                region: 'FE',
            ),
        ]);
    }

    public static function allIdentifiers(): array
    {
        $identifiers = [];
        foreach (self::all()->toArray() as $marketplace) {
            $identifiers[] = $marketplace->getIdentifier();
        }

        return $identifiers;
    }

    public static function allCountryCodes(): array
    {
        $codes = [];
        foreach (self::all()->toArray() as $marketplace) {
            $codes[] = $marketplace->getCountryCode();
        }

        return $codes;
    }

    public static function getMarketplaceById(string $identifier): Marketplace
    {
        return self::all()->filter(function (Marketplace $marketplace) use ($identifier) {
            return $marketplace->getIdentifier() === $identifier;
        })->first();
    }
}
