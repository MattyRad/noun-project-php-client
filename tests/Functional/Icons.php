<?php

require_once 'vendor/autoload.php';

use MattyRad\NounProject;

$key = $argv[1];
$secret = $argv[2];
$term = $argv[3];

$api = new NounProject\Client($key, $secret);

$result = $api->send(new NounProject\Request\Icons($term, true));

if (! $result->isSuccess()) {
    throw new \Exception($result->getReason());
}

foreach ($result->getIcons() as $icon) {
    var_dump($icon->getIconUrl());
}