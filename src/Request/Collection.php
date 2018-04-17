<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Collection extends NounProject\Request
{
    private $collection_id_or_slug;

    public function __construct($collection_id_or_slug)
    {
        $this->collection_id_or_slug = $collection_id_or_slug;
    }

    public function getUri(): string
    {
        return '/collection/' . $this->collection_id_or_slug;
    }

    public function createResult(array $response_data): Support\Result
    {
        return new Result\Success\Collection($response_data['collection'] ?? []);
    }
}
