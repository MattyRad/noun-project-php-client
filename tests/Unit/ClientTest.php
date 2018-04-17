<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject;
use MattyRad\Support;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Prophecy\Argument;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->http = $this->prophesize(HttpClientInterface::class);

        $this->client = new NounProject\Client('key-abc123', 'secret-123', $this->http->reveal());
    }

    public function tearDown()
    {
        unset(
            $this->client,
            $this->http
        );
    }

    public function testSend_returnsResult()
    {
        $this->http->request(Argument::cetera())->willReturn(new HttpResponse);

        $result = $this->client->send($this->mockNounProjectRequest());

        $this->assertInstanceOf(Support\Result::class, $result);
    }

    public function testSend_returnsFailureResultOnApiErrors()
    {
        $this->http->request(Argument::cetera())->willThrow(new \Exception($error_description = 'something went wrong'));

        $result = $this->client->send($this->mockNounProjectRequest());

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Failure\ApiRequestFailed::class, $result);
        $this->assertContains($error_description, $result->getReason());
    }

    public function testSend_sendsHttpRequestThroughClient()
    {
        $this->http->request(Argument::cetera())->willReturn(new HttpResponse);

        $result = $this->client->send($request = $this->mockNounProjectRequest());

        $this->http->request($request->getHttpType(), $request->getUri())->shouldHaveBeenCalled();
    }

    private function mockNounProjectRequest($http_type = 'GET', $uri = '/collection')
    {
        $request = $this->prophesize(NounProject\Request::class);

        $request->getHttpType()->willReturn($http_type);
        $request->getUri()->willReturn($uri);
        $request->createResult(Argument::any())->willReturn($this->prophesize(Support\Result::class)->reveal());

        return $request->reveal();
    }
}
