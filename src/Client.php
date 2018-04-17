<?php namespace MattyRad\NounProject;

use MattyRad\Support;
use GuzzleHttp\ClientInterface as HttpClient;

class Client
{
    const BASE_URL = 'http://api.thenounproject.com';

    private $api_key;
    private $api_secret;
    private $http;

    public function __construct(string $api_key, string $api_secret, HttpClient $http = null)
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->http = $http;
    }

    public function send(Request $n_request): Support\Result
    {
        $http = $this->http ?: new Http\Client($this->api_key, $this->api_secret);

        try {
            $response = $http->request($n_request->getHttpType(), $n_request->getUri());
        } catch (\Exception $e) {
            return new Request\Result\Failure\ApiRequestFailed($e->getMessage());
        }

        return $n_request->createResult((array) json_decode($response->getBody(), true));
    }
}
