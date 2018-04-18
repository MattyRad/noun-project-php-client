<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class RecentIconsTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\RecentIcons, '/icons/recent_uploads?'],
            [new NounProject\Request\RecentIcons(2), '/icons/recent_uploads?offset=2'],
            [new NounProject\Request\RecentIcons(2, 3), '/icons/recent_uploads?offset=2&page=3'],
            [new NounProject\Request\RecentIcons(2, 3, 4), '/icons/recent_uploads?offset=2&page=3&limit=4'],
        ];
    }

    private function recentUploadsResponseData()
    {
        return '{
          "attribution": "like by Dinosoft Labs from Noun Project",
          "attribution_preview_url": "https://d30y9cdsu7xlg0.cloudfront.net/attribution/1684177-600.png",
          "date_uploaded": "2018-04-14",
          "id": "1684177",
          "is_active": "1",
          "is_explicit": "0",
          "license_description": "creative-commons-attribution",
          "nounji_free": "0",
          "permalink": "/term/like/1684177",
          "preview_url": "https://d30y9cdsu7xlg0.cloudfront.net/png/1684177-200.png",
          "preview_url_42": "https://d30y9cdsu7xlg0.cloudfront.net/png/1684177-42.png",
          "preview_url_84": "https://d30y9cdsu7xlg0.cloudfront.net/png/1684177-84.png",
          "sponsor": {},
          "sponsor_campaign_link": null,
          "sponsor_id": "",
          "term": "like",
          "term_id": 1028,
          "term_slug": "like",
          "uploader": {
            "location": "lahore, punjab, PK",
            "name": "Dinosoft Labs",
            "permalink": "/dinosoftlabs",
            "username": "dinosoftlabs"
          },
          "uploader_id": "2169778",
          "year": 2018
        }';
    }
}
