<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\Item;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ListingsItemsResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/listings/2021-08-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getListingsItem(
        string $seller_id,
        string $sku,
        array $marketplace_ids,
        ?string $issue_locale = null,
        ?array $included_data = null,
    ): Item {
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        if ($included_data) {
            $this->validateIsArrayOfStrings($included_data, AmazonEnums::INCLUDED_DATA); // can i use it like this?
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'items/' . $seller_id . $sku, array_filter([
            'SellerIs' => $seller_id,
            'Sku' => $sku,
            'MarketplaceIds'=> $marketplace_ids,
            'IssueLocale' => $issue_locale,
            'IncludedData' => $included_data,
        ]));

        return new Item($response);
    }
}
