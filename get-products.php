<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$db = new Mysqli(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASS'), getenv('MYSQL_DB')); 

$store = getenv('SHOPIFY_STORE'); //'test-shop.myshopify.com'; 	//store url
$select = $db->query("SELECT access_token FROM installs WHERE store = '$store'");
$user = $select->fetch_object();
$access_token = $user->access_token;

$client = new Client();

$response = $client->request(
	'GET', 
	"https://{$store}/admin/products.json",
	[
		'query' => [
			'fields' => 'id,images,title,variants',
			'access_token' => $access_token
		]
	]
);

$result = json_decode($response->getBody()->getContents(), true);

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, [
    'cache' => 'cache',
    'debug' => true
]);

$template = $twig->loadTemplate('products.html');
echo $template->render(['products' => $result['products']]);
