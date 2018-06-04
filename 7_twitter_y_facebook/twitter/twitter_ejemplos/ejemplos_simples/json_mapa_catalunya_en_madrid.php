<?php
/*

Que dicen de Barcelona en Madrid?


- Probar otros parámetros de búsqueda
https://dev.twitter.com/docs/api/1.1/get/search/tweets

q la query puede tener operadors AND OR por ejemplo barcelona
result_type = recent, mixed, popular
count = max 100  (numero de resultados)


El máximo son 450 llamadas cada 15min, es decir 1800 por hora (x100 serian como máximo 180.000 tweets a la hora)

*/


require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//ahora ya podemos utilizar cualquier llamada de la api
$content = $connection->get('search/tweets',

array(
	'q'=>'madrid',
	'geocode'=>'40.416775,-3.70379,200km',  //madrid
	'count'=>100 //máximo es 100
));



?>


<?php
$res=array();
foreach($content->statuses as $tw){
	//if(isset($tw->geo->coordinates)){ //sólo añadir si tiene coordenadas (pocos twitts la tienen)
		//print_r($tw);
		$t=array();
		$t['id']=$tw->id_str;
		$t['user']=$tw->user->screen_name;
		$t['txt']=$tw->text;
		$t['lat']=$tw->geo->coordinates[0];
		$t['lng']=$tw->geo->coordinates[1];
		$res[]=$t;
//	}
}
print json_encode($res);
