<?php namespace MattyRad\NounProject;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use MattyRad\Support;

class Client
{
    private $http;

    public function __construct(HttpClientInterface $http)
    {
        $this->http = $http;
    }

    public function send(Request $request): Support\Result
    {
        $data = $this->http->request($request->getHttpType(), $request->getUri());

        return $request->createResult($data);
    }
}
