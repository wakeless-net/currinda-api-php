<?php

require_once "shared.php";

use \League\OAuth2\Client\Token\AccessToken;


global $argv;

$token = new AccessToken(array(
  "access_token" => $argv[1],
  "refresh_token" => $argv[2]
));

$user_details = $provider->getUserDetails($token);


var_dump($user_details);

