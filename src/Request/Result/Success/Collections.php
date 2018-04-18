<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Collections extends Support\Result\Success
{
    private $collections;

    public function __construct(array $collections)
    {
        $this->collections = $collections;
    }

    public function getCollections(): array
    {
        return $this->collections;
    }
}
