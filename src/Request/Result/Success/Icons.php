<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Icons extends Support\Result\Success
{
    private $icons;

    public function __construct(array $icons)
    {
        $this->icons = $icons;
    }

    public function getIcons(): array
    {
        return $this->icons;
    }
}
