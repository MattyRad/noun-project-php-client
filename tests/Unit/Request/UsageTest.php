<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class UsageTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\Usage, '/oauth/usage'],
        ];
    }

    private function usageResponseData()
    {
        return '{
          "limits": {
            "daily": null,
            "hourly": null,
            "monthly": 5000
          },
          "usage": {
            "daily": 11,
            "hourly": 3,
            "monthly": 37
          }
        }';
    }
}
