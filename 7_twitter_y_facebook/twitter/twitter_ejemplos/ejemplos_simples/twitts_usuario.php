<?php
/*

Los mensajes de un usuario determinado

- Si no pasamos parámetro screen_name son los nuestros!


*/


require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//ahora ya podemos utilizar cualquier llamada de la api
$content = $connection->get('statuses/user_timeline',array('screen_name'=>'edans'));
//$content = $connection->get('statuses/retweets_of_me');
//$content = $connection->get('account/settings');
//$content = $connection->get('users/contributors',array('screen_name'=>'daniel_julia'));

//podemos buscar lat lng aqui http://itouchmap.com/latlong.html

?>


<pre>
<?php print_r($content) ?>
</pre>