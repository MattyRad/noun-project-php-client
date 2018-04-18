<?php namespace MattyRad\NounProject\Unit\Tests\Request;

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

    private function collectionResponseData()
    {
        return '';
    }
}
