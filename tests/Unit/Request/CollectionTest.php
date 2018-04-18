<?php namespace MattyRad\NounProject\Unit\Tests\Request;

use MattyRad\Support;
use MattyRad\NounProject;
use MattyRad\NounProject\Unit\Tests\RequestTest;

class CollectionTest extends RequestTest
{
    public function uriProvider()
    {
        return [
            [new NounProject\Request\Collection(123), '/collection/123'],
            [new NounProject\Request\Collection('feather'), '/collection/feather'],
        ];
    }

    public function testCreateResult_returnsFailureResultForUnexpectedData()
    {
        $n_request = new NounProject\Request\Collection(123);

        $result = $n_request->createResult(['missing stuff']);

        $this->assertInstanceOf(Support\Result\Failure::class, $result);
        $this->assertContains('collection', $result->getReason());
    }

    public function testCreateResult_returnsSuccessResultWithResponseData()
    {
        $n_request = new NounProject\Request\Collection(123);

        $result = $n_request->createResult(['collection' => $expected = ['pretend this is a collection']]);

        $this->assertInstanceOf(Support\Result\Success::class, $result);
        $this->assertInstanceOf(NounProject\Request\Result\Success\Collection::class, $result);
        $this->assertEquals($expected, $result->getCollection());
    }

    private function collectionResponseData()
    {
        return '';
    }
}
