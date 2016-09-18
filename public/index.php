<?php

require_once '../config.php';

require_once __ROOT__ . '/vendor/autoload.php';

$request = new \Task\Request();
$response = $request->handle();

include VIEW_DIR . $response['template'];

