<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject\Client;
use MattyRad\NounProject\Request;
use MattyRad\Support;
use GuzzleHttp\ClientInterface as HttpClientInterface;

class ResultSample extends Support\Result\Success {}

class RequestSample extends Request {
    public function getHttpType(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/uri';
    }

    public function createResult($response_data): Support\Result
    {
        return new ResultSample;
    }
}

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->http = $this->prophesize(HttpClientInterface::class);

        $this->client = new Client($this->http->reveal());
    }

    public function testSend_sendsRequestDataThroughTheHttpClient()
    {
        $request = new RequestSample;

        $result = $this->client->send($request);

        $this->http->request($request->getHttpType(), $request->getUri())->shouldHaveBeenCalled();
    }
}
