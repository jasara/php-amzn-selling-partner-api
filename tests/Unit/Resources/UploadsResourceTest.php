<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Uploads\CreateUploadDestinationResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\UploadsResource::class)]
class UploadsResourceTest extends UnitTestCase
{
    public function testCreateUploadDestinationForResource()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('uploads/create-upload-destination-for-resource');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $resource = Str::random();
        $response = $amzn->uploads->createUploadDestinationForResource(
            marketplace_ids: ['ATVPDKIKX0DER'],
            content_md5: Str::random(),
            content_type: Str::random(),
            resource: $resource,
        );

        $this->assertInstanceOf(CreateUploadDestinationResponse::class, $response);

        $http->assertSent(function (Request $request) use ($resource) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/uploads/2020-11-01/uploadDestinations/'.$resource, urldecode($request->url()));

            return true;
        });
    }
}
