<?php

require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//ahora ya podemos utilizar cualquier llamada de la api
$content = $connection->get('search/tweets',array('q'=>'barcelona'));

?>

<pre>
<?php print_r($content) ?>
</pre>