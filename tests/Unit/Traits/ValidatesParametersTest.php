<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\LwaResource;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ValidatesParameters::class)]
class ValidatesParametersTest extends UnitTestCase
{
    public function testRequiredParametersInObjectException()
    {
        $this->expectException(InvalidParametersException::class);
        $state = Str::random();

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
        );

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testRequiredParametersInObjectPasses()
    {
        $this->expectException(AmznSPAException::class); // Testing it is not the invalid parameters exception
        $this->expectExceptionMessage('State returned from Amazon does not match the original state');

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
        );

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testRequiredParametersInDtoException()
    {
        $this->expectException(InvalidParametersException::class);

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            redirect_url: Str::random(),
            lwa_client_id: null,
            lwa_client_secret: Str::random(),
        );

        $resource_getter = new ResourceGetter($config);
        $resource_getter->getLwa();
    }

    public function testRequiredParametersInDtoPasses()
    {
        $config = $this->setupMinimalConfig();

        $resource_getter = new ResourceGetter($config);
        $auth = $resource_getter->getLwa();

        $this->assertInstanceOf(LwaResource::class, $auth);
    }

    public function testRequiredParametersInArrayException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->lwa->getTokensFromRedirect(Str::random(), [
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testRequiredParametersInArrayPasses()
    {
        $this->expectException(AmznSPAException::class); // Testing it is not the invalid parameters exception
        $this->expectExceptionMessage('State returned from Amazon does not match the original state');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->lwa->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testValidatesStringEnumInvalidValueException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->notifications->getSubscription(Str::random());
    }

    public function testValidatesStringEnumNotInEnumCasesException()
    {
        $this->expectException(InvalidParametersException::class);

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->catalog_items20220401->searchCatalogItems(
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers_type: 'notvalid',
        );
    }

    public function testValidatesStringEnumInvalidEnumClassPassed()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only enum classes are allowed as string values for allowed_values.');

        $stub = new ResourceStub();
        $stub->passInvalidEnumClassToStringEnumValidator();
    }

    public function testValidatesStringEnumPasses()
    {
        $this->expectException(RequestException::class); // Testing it is not the invalid parameters exception

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }

    public function testValidatesArrayOfStringsException()
    {
        $this->expectException(InvalidParametersException::class);
        $this->expectExceptionMessage('There is an invalid value in the array, the array can only contain strings.');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->fulfillment_inbound->getShipments('ATVPDKIKX0DER', 'SHIPMENT', [231]);
    }

    public function testValidatesArrayOfStringsNotSequentialException()
    {
        $this->expectException(InvalidParametersException::class);
        $this->expectExceptionMessage('Arrays of strings must not be associative arrays (they must be sequential).');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->fulfillment_inbound->getShipments('ATVPDKIKX0DER', 'SHIPMENT', [0 => 31, 3 => 231]);
    }

    public function testValidatesArrayOfStringsEnumException()
    {
        $this->expectException(InvalidParametersException::class);
        $this->expectExceptionMessage('is not in the list of allowed values');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->fulfillment_inbound->getShipments('ATVPDKIKX0DER', 'SHIPMENT', ['INVALID_STATUS']);
    }

    public function testValidatesArrayOfStringsPasses()
    {
        $this->expectException(RequestException::class); // Testing it is not the invalid parameters exception

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound->getShipments('ATVPDKIKX0DER', 'SHIPMENT', ['WORKING']);
    }
}

class ResourceStub
{
    use ValidatesParameters;

    public function passInvalidEnumClassToStringEnumValidator(): void
    {
        $this->validateStringEnum('notvalid', ' notanenum');
    }
}
