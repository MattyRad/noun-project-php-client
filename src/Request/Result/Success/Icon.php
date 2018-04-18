<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Icon extends Support\Result\Success
{
    private $icon;

    public function __construct(array $icon)
    {
        $this->icon = $icon;
    }

    public function getIcon(): array
    {
        return $this->icon;
    }
}
