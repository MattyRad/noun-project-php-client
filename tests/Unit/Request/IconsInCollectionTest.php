<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\Support;
use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class IconsInCollectionTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\IconsInCollection(123), '/collection/123/icons?'],
            [new NounProject\Request\IconsInCollection(123, 2), '/collection/123/icons?offset=2'],
            [new NounProject\Request\IconsInCollection(123, 2, 3), '/collection/123/icons?offset=2&page=3'],
            [new NounProject\Request\IconsInCollection(123, 2, 3, 4), '/collection/123/icons?offset=2&page=3&limit=4'],
        ];
    }

    public function testCreateResult_returnsFailureResultForUnexpectedData()
    {
        $n_request = new NounProject\Request\IconsInCollection(123);

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
        $this->assertContains('icons', $result->getReason());
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\IconsInCollection(123);

        $result = $n_request->createResult(['icons' => $expected = ['pretend this is a set of icons']]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Icons::class, $result);
        $this->assertEquals($expected, $result->getIcons());
    }
}
