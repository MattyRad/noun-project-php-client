<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Icons extends Support\Result\Success
{
    private $icons;

    public function __construct(array $icons)
    {
        $this->icons = $icons;
    }

    public function getIcons()
    {
        return array_map(function ($icon_data) {
            return [
                'id' => (int) $icon_data['id'],
                'svg_url' => $icon_data['icon_url'],
            ];
        }, $this->icons);
    }
}
