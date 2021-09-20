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
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A2EUQ1WTGCTBG2',
                country_code: 'CA',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A1AM78C64UM0Y8',
                country_code: 'MX',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'ATVPDKIKX0DER',
                country_code: 'US',
                region: 'NA',
            ),
            new Marketplace(
                identifier: 'A2VIGQ35RCS4UG',
                country_code: 'AE',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1PA6795UKMFR9',
                country_code: 'DE',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'ARBP9OOSHTCHU',
                country_code: 'EG',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1RKKUPIHCS9HS',
                country_code: 'ES',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A13V1IB3VIYZZH',
                country_code: 'FR',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1F83G8C2ARO7P',
                country_code: 'GB',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A21TJRUUN4KGV',
                country_code: 'IN',
                region: 'EU',
            ),
            new Marketplace(
                identifier:  'APJ6JRA9NG5V4',
                country_code: 'IT',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1805IZSGTT6HS',
                country_code: 'NL',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A1C3SOZRARQ6R3',
                country_code: 'PL',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A17E79C6D8DWNP',
                country_code: 'SA',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A2NODRKZP88ZB9',
                country_code: 'SE',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A33AVAJ2PDY3EV',
                country_code: 'TR',
                region: 'EU',
            ),
            new Marketplace(
                identifier: 'A19VAU5U5O7RUS',
                country_code: 'SG',
                region: 'FE',
            ),
            new Marketplace(
                identifier: 'A39IBJ37TRP1C6',
                country_code: 'AU',
                region: 'FE',
            ),
            new Marketplace(
                identifier: 'A1VC38T7YXB528',
                country_code: 'JP',
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

    public static function getMarketplaceById(string $identifier): Marketplace
    {
        return self::all()->filter(function (Marketplace $marketplace) use ($identifier) {
            return $marketplace->getIdentifier() === $identifier;
        })->first();
    }
}
