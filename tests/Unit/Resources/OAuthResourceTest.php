<?php

namespace Tests\Unit\Resources;

use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Constants\MarketplaceData;
use Tests\Unit\UnitTestCase;

class OAuthResourceTest extends UnitTestCase
{
    /**
     * @dataProvider marketplaces
     */
    public function testAuthUrlGenerated(array $marketplace_data)
    {
        $amzn = new AmznSPA($this->setupMinimalConfig($marketplace_data['marketplace_id']));
        $url = $amzn->oauth->getAuthUrl();

        $this->assertEquals($marketplace_data['base_url'] . '/apps/authorize/consent', $url);
    }

    /**
     * @dataProvider marketplaces
     */
    public function testAuthUrlGeneratedWithStateAndRedirectUrl(array $marketplace_data)
    {
        $state = Str::random();
        $redirect_url = 'https://test.com/' . $state;

        $amzn = new AmznSPA($this->setupMinimalConfig($marketplace_data['marketplace_id']));
        $url = $amzn->oauth->getAuthUrl($redirect_url, $state);

        $this->assertEquals($marketplace_data['base_url'] . '/apps/authorize/consent?redirect_url=https%3A%2F%2Ftest.com%2F' . $state . '&state=' . $state, $url);
    }

    public function marketplaces(): array
    {
        $marketplaces = array_map(function ($key, $elem) {
            return [$key => array_merge($elem, [
                'marketplace_id' => $key,
            ])];
        }, array_keys(MarketplaceData::allMarketplaces()), MarketplaceData::allMarketplaces());

        return $marketplaces;
    }
}
