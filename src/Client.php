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

    public function send(Request $request): Support\Result
    {
        $http_client = $this->http ?: new Http\Client($this->api_key, $this->api_secret);

        try {
            $response = $http_client->request($request->getHttpType(), $request->getUri());
        } catch (\Exception $e) {
            return new Request\Result\Failure\ApiRequestFailed($e->getMessage());
        }

        return $request->createResult((array) json_decode($response->getBody(), true));
    }
}
