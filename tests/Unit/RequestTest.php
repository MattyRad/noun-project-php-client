<?php namespace MattyRad\NounProject\Unit\Tests;

use MattyRad\NounProject;

abstract class RequestTest extends \PHPUnit\Framework\TestCase
{
    /**
    * @dataProvider uriProvider
    */
    public function testGetUri_GeneratesCorrectUri(NounProject\Request $request, string $expected_uri)
    {
        $this->assertEquals($expected_uri, $request->getUri());
    }
}
