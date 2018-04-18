<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\Support;
use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class CollectionsTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\Collections, '/collections?'],
            [new NounProject\Request\Collections(2), '/collections?offset=2'],
            [new NounProject\Request\Collections(2, 3), '/collections?offset=2&page=3'],
            [new NounProject\Request\Collections(2, 3, 4), '/collections?offset=2&page=3&limit=4'],
        ];
    }

    public function testCreateResult_returnsFailureResultForUnexpectedData()
    {
        $n_request = new NounProject\Request\Collections(123);

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
        $this->assertContains('collections', $result->getReason());
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\Collections(123);

        $result = $n_request->createResult(['collections' => $expected = ['pretend this is a set of collections']]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Collections::class, $result);
        $this->assertEquals($expected, $result->getCollections());
    }

    private function collectionsResponseData()
    {
        return '';
    }
}
