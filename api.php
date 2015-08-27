<?php

require "shared.php";

$token = $provider->getAccessToken('authorization_code', [
  'code' => $argv[1],
  "state" => $argv[2]
]);

var_dump($token);


$user_details = $provider->getUserDetails($token);

var_dump($user_details);
