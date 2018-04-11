<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject\Client;
use MattyRad\NounProject\Request;
use MattyRad\Support;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use Prophecy\Argument;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->http = $this->prophesize(HttpClientInterface::class);

        $this->client = new Client($this->http->reveal());
    }

    public function testSend_sendsRequestDataThroughTheHttpClient()
    {
        $request = $this->mockRequest();

        $result = $this->client->send($request);

        $this->http->request($request->getHttpType(), $request->getUri())->shouldHaveBeenCalled();
    }

    private function mockRequest($http_type = 'GET', $uri = '/collection')
    {
        $result = $this->prophesize(Support\Result::class)->reveal();

        $r = $this->prophesize(Request::class);

        $r->getHttpType()->willReturn($http_type);
        $r->getUri()->willReturn($uri);
        $r->createResult(Argument::any())->willReturn($result);

        return $r->reveal();
    }
}
