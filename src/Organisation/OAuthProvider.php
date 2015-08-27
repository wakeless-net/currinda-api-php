<?php

namespace Currinda\Organisation;

use \League\OAuth2\Client\Token\AccessToken;
use \League\OAuth2\Client\Provider\AbstractProvider;

class OAuthProvider extends AbstractProvider {
  protected $site, $org_id, $site_url, $url_authorize;

  public function __construct(array $options = [], array $collaborators = []) {
    $this->site = $options["currindaSite"];

    $this->site_url = @$options["currindaSiteUrl"] ?: "https://$this->site.currinda.com/";

    $this->org_id = $options["organisationId"];

    $this->api_location = "$this->site_url/api/v2/organisation/$this->org_id";

    $options["scopes"] = ["user"];

    parent::__construct($options, $collaborators);
  }

//  var $url_authorize= "" , $url_access_token="", $url_user_details="";
    public function urlAuthorize() {
      return $this->api_location."/authorize";
    }

    public function urlAccessToken() {
      return $this->api_location."/token";
    }

    public function urlUserDetails(AccessToken $token) {
      return $this->api_location."/user?access_token=$token";
    }

    public function userDetails($response, AccessToken $token)  {
      return $response;
    }

    public function getUserDetails(AccessToken $token)
    {
        $response = $this->fetchUserDetails($token);

        return $this->userDetails(json_decode($response), $token);
    }

    public function getUserUid(AccessToken $token)
    {
        $response = $this->fetchUserDetails($token, true);

        return $this->userUid(json_decode($response), $token);
    }

    public function getUserEmail(AccessToken $token)
    {
        $response = $this->fetchUserDetails($token, true);

        return $this->userEmail(json_decode($response), $token);
    }

    public function getUserScreenName(AccessToken $token)
    {
        $response = $this->fetchUserDetails($token, true);

        return $this->userScreenName(json_decode($response), $token);
    }
    
}
