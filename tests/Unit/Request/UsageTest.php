<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\Support;
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

    public function testCreateResult_returnsFailureResultForMissingUsage()
    {
        $n_request = new NounProject\Request\Usage;

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
        $this->stringContains('usage', $result->getReason());
    }

    public function testCreateResult_returnsFailureResultForMissingLimits()
    {
        $n_request = new NounProject\Request\Usage;

        $result = $n_request->createResult(['usage' => []]);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\Usage;

        $result = $n_request->createResult([
            'usage' => $expected_usage = ['pretend this is usage'],
            'limits' => $expected_limits = ['pretend this is limits'],
        ]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Usage::class, $result);
        $this->assertEquals($expected_usage, $result->getUsage());
        $this->assertEquals($expected_limits, $result->getLimits());
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
