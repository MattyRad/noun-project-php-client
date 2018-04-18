<?php namespace MattyRad\NounProject\Unit\Tests\Request;

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

    private function collectionsResponseData()
    {
        return '';
    }
}
