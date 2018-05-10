<?php

/* propuestas de modificacion

- recoger el tag de la url
- poder navegar a través de los tags
- mejorar la presentacion

*/

$tag="tempsdeflors";

$apikey="c8abcb2729a2b86f6c4a3492299cdeaf";
$uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&per_page=20&api_key=".$apikey."&tags=".$tag;
$uri.="&extras=url_m,tags&format=json&nojsoncallback=1";



$data=file_get_contents($uri);
$object = json_decode( $data ); // stdClass object

//aqui ya tengo los datos en un array de php

?>

<pre>
<?php
//print_r($object);
?>
</pre>

<?php
foreach($object->photos->photo as $p):
	$link="http://flickr.com/photo.gne?id=".$p->id;
?>
	<a href='<?php print $link?>'><img src='<?php print $p->url_m?>'></a>";

	<?php
	$tags=explode(" ",$p->tags);
	print_r($tags);
endforeach;
?>
