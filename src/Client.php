<?php namespace MattyRad\NounProject;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use GuzzleHttp\Exception\GuzzleException;
use MattyRad\Support;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response as HttpResponse;

class Client
{
    const BASE_URL = 'http://api.thenounproject.com';

    private $api_key;
    private $api_secret;
    private $fake_http;

    public function __construct(string $api_key, string $api_secret, bool $fake_http = false)
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->fake_http = $fake_http;
    }

    public function send(Request $request): Support\Result
    {
        $handler = $this->prepHttpHandler();

        $http = new GuzzleClient([
            'base_uri' => self::BASE_URL,
            'handler' => $handler,
            'auth' => 'oauth',
        ]);

        try {
            $response = $http->request($request->getHttpType(), $request->getUri());
        } catch (GuzzleException $e) {
            throw $e;
        }

        return $request->createResult((array) json_decode($response->getBody(), true));
    }

    private function prepHttpHandler()
    {
        if ($this->fake_http) {
            $stack = new MockHandler([
                new HttpResponse(200, ['X-Foo' => 'Bar']),
            ]);
        } else {
            $stack = HandlerStack::create();

            $middleware = new Oauth1([
                'consumer_key'    => $this->api_key,
                'consumer_secret' => $this->api_secret,
                'token'           => null,
                'token_secret'    => null
            ]);

            $stack->push($middleware);
        }

        return $stack;
    }
}
