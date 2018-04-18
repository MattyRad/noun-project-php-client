<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\Support;
use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class IconsTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\Icons('feather'), '/icons/feather?'],
            [new NounProject\Request\Icons('feather', false), '/icons/feather?'],
            [new NounProject\Request\Icons('feather', true), '/icons/feather?limit_to_public_domain=1'],
            [new NounProject\Request\Icons('feather', true, 2), '/icons/feather?limit_to_public_domain=1&offset=2'],
            [new NounProject\Request\Icons('feather', false, 2), '/icons/feather?offset=2'],
            [new NounProject\Request\Icons('feather', false, 2, 2, 2), '/icons/feather?offset=2&page=2&limit=2'],
        ];
    }

    public function testCreateResult_returnsFailureResultForUnexpectedData()
    {
        $n_request = new NounProject\Request\Icons('feather');

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\Icons('feather');

        $result = $n_request->createResult(['icons' => $expected = ['pretend this is a set of icons']]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Icons::class, $result);
        $this->assertEquals($expected, $result->getIcons());
    }

    private function iconsResponseData()
    {
        return '[
            {
              "attribution": "feather by Eduardo Souza from Noun Project",
              "collections": [],
              "date_uploaded": "2012-02-27",
              "icon_url": "https://d30y9cdsu7xlg0.cloudfront.net/noun-svg/1628.svg?Expires=1523983081&Signature=I4Y~xdeypPkQ6gI5-Imndy~uVjXCdLB5KKHDjyS6-XOaXsaUM1fk8sHTX33hG5fVU-JTaciHQl0OgQPO8U2AT3sKReWPGKYVbwhyYpD5WGAgyZ6COP1Kb-S8b-yp2KAc2h85glYg2V~82THo04o-c1KkaiiE6exEx2uUlZ47sxI_&Key-Pair-Id=APKAI5ZVHAXN65CHVU2Q",
              "id": "1628",
              "is_active": "1",
              "is_explicit": "0",
              "license_description": "public-domain",
              "nounji_free": "0",
              "permalink": "/term/feather/1628",
              "preview_url": "https://d30y9cdsu7xlg0.cloudfront.net/png/1628-200.png",
              "preview_url_42": "https://d30y9cdsu7xlg0.cloudfront.net/png/1628-42.png",
              "preview_url_84": "https://d30y9cdsu7xlg0.cloudfront.net/png/1628-84.png",
              "sponsor": {},
              "sponsor_campaign_link": null,
              "sponsor_id": "",
              "tags": [
                {
                  "id": 2082,
                  "slug": "feather"
                },
                {
                  "id": 501,
                  "slug": "bird"
                },
                {
                  "id": 2583,
                  "slug": "constitution"
                },
                {
                  "id": 502,
                  "slug": "flight"
                },
                {
                  "id": 1192,
                  "slug": "ink"
                },
                {
                  "id": 133,
                  "slug": "letter"
                },
                {
                  "id": 2584,
                  "slug": "magna-carta"
                },
                {
                  "id": 1193,
                  "slug": "pen"
                }
              ],
              "term": "feather",
              "term_id": 2082,
              "term_slug": "feather",
              "uploader": {
                "location": "",
                "name": "Eduardo Souza",
                "permalink": "/souzaead",
                "username": "souzaead"
              },
              "uploader_id": "3382",
              "year": 2012
            }
        ]';
    }
}
