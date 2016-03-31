<?php namespace WowApi;

use WowApi\Util\Helper;
use WowApi\Auth\WowOAuth;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../src/WowApi/autoload.php';
require_once '../vendor/autoload.php';

$keys = Helper::getKeys('keys.txt', true);

$client = new WowOAuth($keys['api'], $keys['secret'], 'https://192.168.2.218/wowapi/samples/oauth.php');

if (!isset($_GET['code'])) {
    $auth_url = $client->getAuthorizationUrl();
    header('Location: ' . $auth_url);
    die('Redirect');
} else {
    $response = $client->getAccessToken();
    Helper::print_rci($response);
}

//$z = $client->getAccessToken();

//Helper::print_rci($z);