

<?php

session_start();

require_once 'vendor/autoload.php';

$clientID='612446309759-3kt2b3u890nl8jcarm9quca1g438oim3.apps.googleusercontent.com';
$clientSecret='vdWPZM122F-puDDih6gFy3a2';
$redirectUrl='http://localhost/projet_blog/login.php';

//creating client request to google
$client = new Google_client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');
//test
//$client->addScope('token');

//Evite probleme de certificat SSL en local
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);


if(isset($_GET['code'])){
$token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
//echo $_GET['code'];
$tokenAccess = $_GET['code'];
//print_r();
$client->setAccessToken($token);

//getting user profile
$gauth = new Google_Service_Oauth2($client);
$google_info = $gauth->userinfo->get();
$email = $google_info->email;
$name = $google_info->name;

//statut connecté !!
//$token = $google_info->token;

echo "welcome " . $name . " Vous etes enregistré utilisant l'e-mail suivant : " . $email . " token: " . $tokenAccess; 
$_SESSION['nameGoogle'] = $name;
var_dump($_SESSION['nameGoogle']);//
//header('Location: http://blog/index.php');
}
else {
	echo "<a href='" . $client->createAuthUrl() . "'>Login Google</a>";

}