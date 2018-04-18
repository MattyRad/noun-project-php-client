<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Collection extends Support\Result\Success
{
    private $collection;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}
