<?php namespace MattyRad\NounProject\Http;

use GuzzleHttp as Guzzle;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

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

    public function request(string $type, string $uri)
    {
        $handler = $this->prepHttpHandler();

        $http = new Guzzle\Client([
            'base_uri' => self::BASE_URL,
            'handler' => $handler,
            'auth' => 'oauth',
        ]);

        return $http->request($type, $uri);
    }

    private function prepHttpHandler()
    {
        $stack = Guzzle\HandlerStack::create();

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
