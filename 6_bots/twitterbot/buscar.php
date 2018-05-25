<?php
require "config.php";
require "twitteroauth/twitteroauth.php";
//buscar twitts con un tag y una posición determinadas..
$tag="barcelona";

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);
$content = $connection->get('search/tweets',array(
	'q'=>"%20".$tag."%20",
	'geocode'=>'41.387917,2.1699187,10km')
);
$user="";

//print_r($content);

foreach($content->statuses as $twitt){
	echo "<li>";
	echo $twitt->user->screen_name;
	echo ": ";
	echo $twitt->text;
	echo "</li>";
}