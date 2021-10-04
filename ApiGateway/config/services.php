<?php
$baseUri = env('APP_URI') == 'local' ? 'http://localhost' : 'http://%s.liveserviceurl.com/';
defined('BASE_URI') or define('BASE_URI', 'prod');
return [
    'company'   =>  [
        'base_uri'  =>  env('APP_URI') == 'local' ? "$baseUri:8001" : sprintf($baseUri,'company'),
        'secret'  =>  request()->headers,
    ]
];