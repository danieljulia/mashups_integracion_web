<?php
require "config.php";

//buscar twitts con un tag y una posición determinadas..
$tag="gat";

//centro barcelona y 10km a la redonda
$geocode="&geocode=41.387917,2.1699187,10km";
$url="http://search.twitter.com/search.json?q=".$tag.$geocode."&rpp=10";

//no funciona en este servidor -> $content=file_get_contents($url);

//mÃ©todo alternativo
$content=doCurl($url);


$data=json_decode($content);

foreach($data->results as $twitt){
	print $twitt->from_user;
	print "\r\n".$twitt->created_at;
	$dt=strtotime( $twitt->created_at)-time();
	//si llamo al cron cada 5 min-- 5x60=300 segundos
	if($dt<300) print "aqui lanzaria el twitt";

}


print_r($data); // para ver que contiene data


?>
