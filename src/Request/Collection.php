<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Collection extends NounProject\Request
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getUri(): string
    {
        return '/collection/' . $this->id;
    }

    public function createResult(array $response_data): Support\Result
    {
        return new Result\Success\Icon($response_data['collection']);
    }
}
