<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class User extends NounProject\Request
{
    private $user_id;

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUri(): string
    {
        return '/user/' . $this->user_id . '/collections';
    }

    public function createResult(array $response_data): Support\Result
    {
        return new Result\Success\Icon($response_data['collections']);
    }
}
