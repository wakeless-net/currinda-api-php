This provides a PHP Provider for the Currinda APIs. Currently the only thing that is implemented is the Organisation OAuth Provider. 

To come is a better php interface.


## OAuth Usage

    use Currinda\Organisation\OAuthProvider;

    $provider = new OAuthProvider([
      "organisationId" => "...",
      "currindaSite" => "...",
      "clientId" => $client_id,
      "clientSecret" => $client_secret,
      "currindaSite" => "acme",
      "redirectUri" => "http://currinda.com"
    ]);


    //Authorize user and get code
    redirect_user( $provider->getAuthorizationURL());


    //grab code from redirect url and get access_token
    $code = $_GET["code"];
    $state = $_GET["state"];

    $token = $provider->getAccessToken('authorization_code', [
      'code' => $code,
      "state" => $state
    ]);


    //use token to grab the user details
    $user_details = $provider->getUserDetails($token);

## API

```$provider->getUserDetails(AccessToken $token);```
Get all user details including all membership data


```$provider->getUserMembership(AccessToken $token);```
Get personal membership details for user

```$provider->getCorporateMemberships(AccessToken $token);```
Get corporate membership details for user. This will return an array of all membership data.

