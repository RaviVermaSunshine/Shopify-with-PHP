<?php
require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$db = new Mysqli(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASS'), getenv('MYSQL_DB')); 

if (!empty($_POST)) {
	
	$store = $_POST['store'];

	$factory = new RandomLib\Factory;
	$generator = $factory->getMediumStrengthGenerator();
	$nonce = $generator->generateString(20);

	$api_key = getenv('SHOPIFY_APIKEY');
	$scopes = getenv('SHOPIFY_SCOPES');
	$redirect_uri = urlencode(getenv('SHOPIFY_REDIRECT_URI'));

	if ($query = $db->prepare('INSERT INTO installs SET store = ?, nonce = ?, access_token = ""')) {
		$query->bind_param('ss', $store, $nonce);
		$query->execute();
		$query->close();
		$url = "https://{$store}/admin/oauth/authorize?client_id={$api_key}&scope={$scopes}&redirect_uri={$redirect_uri}&state={$nonce}";
		header("Location: {$url}");
	}

} else {
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader, [
	    'cache' => 'cache',
	    'debug' => true
	]);

	$template = $twig->loadTemplate('install.html');
	echo $template->render([]);
}
