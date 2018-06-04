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
	'q'=>'wikiloc',
	'geocode'=>'40.416775,-3.70379,10km'  //madrid
));

//podemos buscar lat lng aqui http://itouchmap.com/latlong.html

?>

<ul>
<?php foreach($content->statuses as $tw): ?>
<li><?php echo $tw->user->name ?>  : <?php echo $tw->text ?></li>

<?php endforeach; ?>
<pre>
<?php print_r($content) ?>
</pre>
