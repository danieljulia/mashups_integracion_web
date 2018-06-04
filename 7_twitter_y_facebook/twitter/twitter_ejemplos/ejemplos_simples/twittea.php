<?php



require "twitteroauth/twitteroauth.php";

/*



- crear un app en https://dev.twitter.com/apps/new

- entrar la cuenta de twitter

- Rellenar los datos (no es necesario rellenar el campo callback url)

- Copiar Consumer key y consumer secret

- Pulsar botón "create my acces token"

- Copiar access token y token secret (abajo)

- Asegurarse que la aplicación tiene derechos de escritura (application type /read & write)

*/


require_once('config.php');
 

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);



//$content = $connection->get('account/verify_credentials');

 

$res=$connection->post('statuses/update', array('status' => utf8_encode("hola soy basilio!")));



print_r($res);



