<?php
//primer paso: obtener twitts a partir de una busqueda

error_reporting(E_ALL);
ini_set('display_errors', 1);



require "config.php";
require_once('twitteroauth/twitteroauth.php');


//buscar twitts con un tag y una posición determinadas..
$tag="elisava";

//centro barcelona y 10km a la redonda
//41.387917,2.1699187,10km";



//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//ahora ya podemos utilizar cualquier llamada de la api
//https://dev.twitter.com/rest/reference/get/search/tweets

$content = $connection->get('search/tweets',array(
	'q'=>$tag,
	'geocode'=>'41.387917,2.1699187,10km')
);
$user="";



//rastrear todos los twitts
foreach($content->statuses as $twitt){
	print_r($twitt);
}
