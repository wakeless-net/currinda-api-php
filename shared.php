<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;

use Currinda\Organisation\OAuthProvider;

$client_id = "...";
$client_secret = "...";
$org_id = "...";
$site_id = "...";


$provider = new OAuthProvider([
  "organisationId" => $org_id,
  "currindaSite" => $site_id,
  "clientId" => $client_id,
  "clientSecret" => $client_secret,
  //"currindaSite" => "...",
  "redirectUri" => "http://currinda.com"
]);

