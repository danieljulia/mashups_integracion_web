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
$content = $connection->get('statuses/user_timeline',array('screen_name'=>'daniel_julia'));
//$content = $connection->get('statuses/retweets_of_me');
//$content = $connection->get('account/settings');
//$content = $connection->get('users/contributors',array('screen_name'=>'daniel_julia'));

//podemos buscar lat lng aqui http://itouchmap.com/latlong.html

function linkify_tweet($tweet) {

  //Convert urls to <a> links
  $tweet = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet);

  //Convert hashtags to twitter searches in <a> links
  $tweet = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet);

  //Convert attags to twitter profiles in <a> links
  $tweet = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet);

  return $tweet;

}

?>


<ul class="tweets">
<?php foreach($content as $twitt) :
$timestamp = strtotime($twitt->created_at);
$d = date('d/m/Y',$timestamp);

?>
<li><?php print $d?> - <?php print linkify_tweet($twitt->text)?></li>
<?php endforeach; ?>
</ul>
