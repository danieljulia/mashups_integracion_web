<?php
require "config.php";
require "twitteroauth/twitteroauth.php";




//buscar twitts con un tag y una posici�n determinadas..
$tag="gat";

//centro barcelona y 10km a la redonda
$geocode="&geocode=41.387917,2.1699187,10km";
$url="http://search.twitter.com/search.json?q=".$tag.$geocode."&rpp=10";

//no funciona en este servidor -> $content=file_get_contents($url);

//m�todo alternativo
$content=doCurl($url);


$data=json_decode($content);

$user="";
foreach($data->results as $twitt){
	print $twitt->from_user;
	print "\r\n".$twitt->created_at;
	$dt=strtotime( $twitt->created_at)-time();
	//si llamo al cron cada 30 min-- 30x60=1800 segundos
	if( strtolower($twitt->from_user)!="basiliobdn"){ //atenci�n!!
		if($dt<1800){
			$user=$twitt->from_user;
			print "Ha encontrado este twitt ".$twitt->text." del usuario ".$twitt->from_user;
			break; //sale del bucle, s�lo hago un twitt

		}
	}
}


if($user!=""){ //si ha encontrado un twitt apto

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
	//$content = $connection->get('account/verify_credentials');

	$res=$connection->post('statuses/update', array('status' => utf8_encode("hola @".$user.", oi que s�c maco? (perdona s�c un bot i m'estan provant, :=) la culpa �s teva per dir 'gat')")));

	//print_r($res);


}

function doCurl($url){
	$ch = curl_init(); // open curl session
	// set curl options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch); // execute curl session
	curl_close($ch); // close curl session
	return $data;
}
