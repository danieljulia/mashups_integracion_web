<?php

/* ejemplo para comprabar que file_get_contents funciona */


$tag="barcelona";

$apikey="c8abcb2729a2b86f6c4a3492299cdeaf";
$uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=".$apikey."&tags=".$tag."&extras=url_m&format=json&nojsoncallback=1";

$data=file_get_contents($uri);
$object = json_decode( $data ); // stdClass object

//aqui ya tengo los datos en un array de php
print_r($object);
?>




<?php

//alternativa si no funciona file_get_contents (puede que no esté activado en el php)

function my_file_get_contents($url){
	$ch = curl_init(); // open curl session
	// set curl options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch); // execute curl session
	curl_close($ch); // close curl session
	return $data;
}

?>
