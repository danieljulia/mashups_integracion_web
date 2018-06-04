<?php
//segundo paso: guardar todos los twitts
//atención: hay que llamarlo desde un cron cada x tiempo (por ejemplo cada minuto para que vaya guardando información en la base de datos


require_once('twitteroauth/twitteroauth.php');
require "config.php";
require "twitter.php";

/*
Necesitamos una base de datos con la table del archivo dump.sql
poner los datos de la conexión en config.php!
*/

$tw=new twitterDB(DB_HOST,DB_USER,DB_PWD,DB_NAME);



//buscar twitts con un tag y una posición determinadas..
$tag="%23barcelona";

//centro barcelona y 10km a la redonda
//41.387917,2.1699187,10km";


//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//ahora ya podemos utilizar cualquier llamada de la api
//https://dev.twitter.com/rest/reference/get/search/tweets
$content = $connection->get('search/tweets',array(
	'q'=>$tag,
	//'geocode'=>'41.387917,2.1699187,10km')
	)
);


//rastrear todos los twitts
foreach($content->statuses as $twitt){
	
	//si quiero ver lo que hay aqui
	//print_r($twitt);
	
	//si hay información geografica esta eb $twitt->geo->coordinates[0] y [1]
	print "<br/><br/>".$twitt->id_str." ".$twitt->text;
	if( !$tw->twittExiste($twitt->id_str) ){
		$tw->twittInsert($twitt->id_str,$twitt->text,$twitt->user->screen_name,$twitt->user->profile_image_url);
		print "<br/>***insertando el twitt..".$twitt->text;
	}
	

	
}

