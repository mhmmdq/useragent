<?php

require __DIR__ . '/vendor/autoload.php';

use Mhmmdq\Useragent\UserAgent;

$useragent = UserAgent::analyze();

var_dump($useragent);