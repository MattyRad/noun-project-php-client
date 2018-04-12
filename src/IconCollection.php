<?php namespace MattyRad\NounProject;

use Illuminate\Support\Collection;

class IconCollection extends Collection
{
    public static function fromResponseData(array $response_data)
    {
        $icons = array_map(function (array $icon_data) {
            return Icon::fromArray($icon_data);
        }, $response_data);

        return new self($icons);
    }
}
