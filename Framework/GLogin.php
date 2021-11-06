<?php 

namespace App\Framework;

use Google_Client;
use Google_Service_Oauth2;
use App\Controleur\Home;
use App\Model\User;


require_once '../vendor/autoload.php';

class GLogin {

	const GOOGLE_CLIENT_ID = '612446309759-3kt2b3u890nl8jcarm9quca1g438oim3.apps.googleusercontent.com';
    const GOOGLE_CLIENT_SECRET = 'vdWPZM122F-puDDih6gFy3a2';
    //const GOOGLE_REDIRECT_URL = 'http://localhost/projet_blog/public/index.php?controller=home&action=googleData';
    const GOOGLE_SCOPE_1 = 'profile';
	const GOOGLE_SCOPE_2 = 'email';

	public function login($paramUrl){
		
		$client = new Google_client();
		$client->setClientId(self::GOOGLE_CLIENT_ID);
		$client->setClientSecret(self::GOOGLE_CLIENT_SECRET);
		$client->setRedirectUri($paramUrl);
		$client->addScope(self::GOOGLE_SCOPE_1);
		$client->addScope(self::GOOGLE_SCOPE_2);
		
		//echo "<a id='clickJsGoogle' href='" . $client->createAuthUrl() . "'></a>";
		$_SESSION['linkGoogle'] = "<a id='clickJsGoogle' href='" . $client->createAuthUrl() . "'></a>";
	}}
	





































