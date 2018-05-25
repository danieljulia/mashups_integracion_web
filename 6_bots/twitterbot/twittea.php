<?php
/** este ejemplo publica un twitt */

require "config.php";
require "twitteroauth/twitteroauth.php";



$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);

//$content = $connection->get('account/verify_credentials');

$res=$connection->post('statuses/update', array('status' => utf8_encode("¿Eh que soy un gato muy bonito?")));

print_r($res);

