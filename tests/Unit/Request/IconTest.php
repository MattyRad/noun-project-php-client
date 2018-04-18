<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\NounProject;
use MattyRad\Support;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class IconTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\Icon(123), '/icon/123'],
            [new NounProject\Request\Icon('feather'), '/icon/feather'],
        ];
    }

    public function testCreateResult_returnsFailureResultForUnexpectedData()
    {
        $n_request = new NounProject\Request\Icon('feather');

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\Icon('feather');

        $result = $n_request->createResult(['icon' => $expected = ['pretend this is icon data']]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Icon::class, $result);
        $this->assertEquals($expected, $result->getIcon());
    }

    private function iconResponseData()
    {
        return '{
            "attribution": "Jupiter from Noun Project",
            "collections": [],
            "date_uploaded": "",
            "icon_url": "https://d30y9cdsu7xlg0.cloudfront.net/noun-svg/123.svg?Expires=1523997366&Signature=e0m5IC3AZdLsr-DnY7hzeIkALA~d4Yfi62pCRIzkENiTx9R7iQ9Xii3h5dbCQsHp-SWQr7A4p6RilbTKU5aJNdPI0kCLVqGiLd9Tphs0NSv57Y1oAsUBcpjFgQVWEkSaRwJXmF0HRJpy3icm5PTh9ZRCmIKutc2tFj7noEv3sCQ_&Key-Pair-Id=APKAI5ZVHAXN65CHVU2Q",
            "id": "123",
            "is_active": "1",
            "is_explicit": "0",
            "license_description": "public-domain",
            "nounji_free": "0",
            "permalink": "/term/jupiter/123",
            "preview_url": "https://d30y9cdsu7xlg0.cloudfront.net/png/123-200.png",
            "preview_url_42": "https://d30y9cdsu7xlg0.cloudfront.net/png/123-42.png",
            "preview_url_84": "https://d30y9cdsu7xlg0.cloudfront.net/png/123-84.png",
            "sponsor": {},
            "sponsor_campaign_link": null,
            "sponsor_id": "",
            "tags": [
              {
                "id": 167,
                "slug": "jupiter"
              }
            ],
            "term": "Jupiter",
            "term_id": 167,
            "term_slug": "jupiter",
            "uploader": {},
            "uploader_id": "",
            "year": null
          }';
    }
}
