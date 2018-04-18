<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject;
use MattyRad\Support;

abstract class RequestTest extends \PHPUnit\Framework\TestCase
{
    abstract public function uriProvider();

    /**
    * @dataProvider uriProvider
    */
    public function testGetUri_GeneratesCorrectUri(NounProject\Request $request, string $expected_uri)
    {
        $this->assertEquals($expected_uri, $request->getUri());
    }

    public function testGetHttpType_DefaultsToGET()
    {
        $n_request = new SampleRequest;

        $this->assertEquals('GET', $n_request->getHttpType());
    }
}

class SampleRequest extends NounProject\Request
{
    public function getUri(): string
    {
        return '/uri';
    }

    public function createResult(array $response_data): Support\Result {}
}
