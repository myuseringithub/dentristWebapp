<?php
require_once( '/var/www/sharedFiles/composer_dependencyManager/services_dependency/vendor/autoload.php');


// for SDK 2 firebase
//   use Firebase\Token\TokenException;
//   use Firebase\Token\TokenGenerator;
//
//   const DEFAULT_URL = 'https://intense-heat-1283.firebaseio.com/';
//   const DEFAULT_TOKEN = '';
//   const DEFAULT_PATH = '/';
//
// $domain = 'gazitengcom'; // domain as user.
// try {
//     $generator = new TokenGenerator(DEFAULT_TOKEN);
//     $expirationDate = new DateTime('06/31/2090');
//     $token = $generator
//         ->setOptions([
//             'expires' => $expirationDate
//         ])
//         ->setData(array('uid' => $domain))
//         ->create();
// } catch (TokenException $e) {
//     echo "Error: ".$e->getMessage();
// }
//
// echo $token;


/////////////////////////////////////////////////////

use \Firebase\JWT\JWT;
// Get your service account's email address and private key from the
// JSON key file
$service_account_email = ""; // google services account email for services
$private_key = "";
$uids = ['gazitengcom', 'dentristcom']; // domain as user.
$is_premium_account = false;

function create_custom_token($uid, $is_premium_account) {
  global $service_account_email, $private_key;
  $now_seconds = time();
  $payload = array(
      "iss" => $service_account_email,
      "sub" => $service_account_email,
      "aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
      "iat" => $now_seconds,
      "exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
      "uid" => $uid,
      "claims" => ["premium_account" => $is_premium_account]
  );
  return JWT::encode($payload, $private_key, "RS256");
}

echo 'gaz</br>';
echo create_custom_token($uids[0], $is_premium_account);

echo '</br></br>den</br>';
echo create_custom_token($uids[1], $is_premium_account);
