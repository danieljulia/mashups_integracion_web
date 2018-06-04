<?php
/*
Pasar el tag por la url   ?tag=barcelona
*/

if(isset($_GET['tag'])){
	$tag=$_GET['tag'];
}else{
	$tag="spring";
}

require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

//creamos el objeto utilizando la libreria y los códigos de config.php
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN,OAUTH_SECRET);

//documentado aqui https://dev.twitter.com/docs/using-search
$positivos = $connection->get('search/tweets',array('q'=>$tag.'+:)'));
$negativos = $connection->get('search/tweets',array('q'=>$tag.'+:('));


?>
<!doctype html>
<head>
</head>
<body>
<h1><?php echo $tag?></h1>


<h2>Positivos</h2>
<ul>
<?php foreach($positivos->statuses as $tw): ?>
<li><?php echo $tw->user->name ?>  : <?php echo $tw->text ?> <?php echo $tw->created_at ?></li>
<?php endforeach; ?>

</ul>

<?php
//calcular la diferencia de tiempo entre el primero y el último
$total=count($positivos->statuses);
$t0=strtotime($positivos->statuses[0]->created_at);
$t1=strtotime($positivos->statuses[$total-1]->created_at);
$dif_positivos=$t0-$t1;
$tweets_por_dia=intval( ($total*60*60*24)/$dif_positivos);
print $tweets_por_dia." tweets/dia";
?>

<h2>Negativos</h2>
<ul>
<?php foreach($negativos->statuses as $tw): ?>
<li><?php echo $tw->user->name ?>  : <?php echo $tw->text ?> <?php echo $tw->created_at ?></li>
<?php endforeach; ?>
</ul>

<?php
//calcular la diferencia de tiempo entre el primero y el último
$total=count($negativos->statuses);
$t0=strtotime($negativos->statuses[0]->created_at);
$t1=strtotime($negativos->statuses[$total-1]->created_at);
$dif_negativos=$t0-$t1;
$tweets_por_dia=intval( ($total*60*60*24)/$dif_negativos);
print $tweets_por_dia." tweets/dia";
?>


</body>
</html>
