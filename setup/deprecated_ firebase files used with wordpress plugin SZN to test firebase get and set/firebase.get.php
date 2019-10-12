<?php

// Firebase autoload
require_once( '/var/www/composer_dependencyManager/services_dependency/vendor/autoload.php');

const DEFAULT_URL = 'https://intense-heat-1283.firebaseio.com/';
const DEFAULT_TOKEN = ''; // token for firebase
const DEFAULT_PATH = '/';


$token = DEFAULT_TOKEN;
$domain = str_replace(".", "", 'wordpresswebappwpdevwebapprun');

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, $token);

$stylesheets = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/stylesheets'), true);
$javascripts = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/javascripts'), true);

echo '<pre>';
print_r($files);
echo '</pre>';
