<?php

require_once 'vendor/autoload.php';

use MattyRad\NounProject;

$api = new NounProject\Client($argv[1], $argv[2]);

$result = $api->send(new NounProject\Request\Usage);

if (! $result->isSuccess()) {
    print "\nFAILED: " . $result->getReason() . "\n";
    exit;
}

$monthly_usage = $result->getUsage()['monthly'];
$monthly_limit = $result->getLimits()['monthly'];

print "\nSUCCESS! Monthly API limit: $monthly_usage/$monthly_limit (" . $monthly_usage / $monthly_limit . ")\n";
