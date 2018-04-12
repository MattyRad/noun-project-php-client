<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;
use MattyRad\NounProject\IconCollection;

class Icons extends Support\Result\Success
{
    private $icons;

    public function __construct(IconCollection $icons)
    {
        $this->icons = $icons;
    }

    public function getIcons(): IconCollection
    {
        return $this->icons;
    }
}
