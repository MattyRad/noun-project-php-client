<?php namespace MattyRad\NounProject;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use GuzzleHttp\Exception\GuzzleException;
use MattyRad\Support;

class Client
{
    const BASE_URL = 'http://api.thenounproject.com';

    private $api_key;
    private $api_secret;

    public function __construct(string $api_key, string $api_secret)
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
    }

    public function send(Request $request): Support\Result
    {
        $handler = $this->prepOAuthHandler();

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

        return $request->createResult(json_decode($response->getBody(), true));
    }

    private function prepOAuthHandler()
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => $this->api_key,
            'consumer_secret' => $this->api_secret,
            'token'           => null,
            'token_secret'    => null
        ]);

        $stack->push($middleware);

        return $stack;
    }
}
