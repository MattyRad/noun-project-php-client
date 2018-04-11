<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject\Client;
use MattyRad\NounProject\Request;
use MattyRad\Support;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Prophecy\Argument;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->http = $this->prophesize(HttpClientInterface::class);

        $this->client = new Client($this->http->reveal());
    }

    // bottom-side, which is better?
    public function testSend_sendsRequestDataThroughTheHttpClient()
    {
        $request = $this->mockRequest();

        $this->http->request(Argument::cetera())->willReturn(new HttpResponse);

        $result = $this->client->send($request);

        $this->http->request($request->getHttpType(), $request->getUri())->shouldHaveBeenCalled();
    }

    // top-side, which is better?
    public function testSend_sendsRequestDataThroughTheHttpClientTopSideTest()
    {
        $request = $this->mockRequest();

        $this->http->request($request->getHttpType(), $request->getUri())
            ->willReturn(new HttpResponse)
            ->shouldBeCalled();

        $result = $this->client->send($request);
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
