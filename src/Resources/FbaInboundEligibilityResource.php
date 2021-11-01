<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\FbaInboundEligibility\GetItemEligibilityPreviewResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FbaInboundEligibilityResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/fba/inbound/v1/eligibility/itemPreview';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getItemEligibilityPreview(?array $marketplace_ids, string $asin, string $program): GetItemEligibilityPreviewResponse
    {
        if ($marketplace_ids) {
            $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        }
        $this->validateStringEnum($program, ['INBOUND', 'COMMINGLING']);

        $response = $this->http->get($this->endpoint . self::BASE_PATH, array_filter([
            'marketplaceIds' => $marketplace_ids,
            'asin' =>$asin,
            'program'=>$program,
        ]));

        return new GetItemEligibilityPreviewResponse($response);
    }
}
