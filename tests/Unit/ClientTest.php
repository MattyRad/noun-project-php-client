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
        $this->client = new Client('key-abc123', 'secret-123');
    }

    public function tearDown()
    {
        unset(
            $this->client
        );
    }

    public function testSend_returnsResult()
    {
        $result = $this->client->send($this->mockRequest());

        $this->assertInstanceOf(Support\Result::class, $result);
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
