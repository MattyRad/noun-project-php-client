<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Icon extends NounProject\Request
{
    private $icon_id_or_term;

    public function __construct($icon_id_or_term)
    {
        $this->icon_id_or_term = $icon_id_or_term;
    }

    public function getUri(): string
    {
        return '/icon/' . $this->icon_id_or_term;
    }

    public function createResult(array $response_data): Support\Result
    {
        return new Result\Success\Icon($response_data['icon'] ?? null);
    }
}
