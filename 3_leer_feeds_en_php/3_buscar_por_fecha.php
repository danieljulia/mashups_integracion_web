<?php

/*

cambiar los parámetros
escoger de los muchos de la ldap_first_attribute

https://www.flickr.com/services/api/flickr.photos.search.html

por ejemplo

- ordenar de más a menos interesante
- busqueda en el texto
- licencia
- fitro geográfico
- etc ......

*/


$tag="barcelona"; //probar tarragona
$timestamp=1524513600; //sant jordi (23/4) a las 20.00

$apikey="c8abcb2729a2b86f6c4a3492299cdeaf";
$uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=".$apikey."&tags=".$tag;
//$uri.="&min_taken_date=2013-04-23%2016:00&max_taken_date=2013-04-23%2020:00";
$uri.="&min_taken_date=".($timestamp-60*60*12)."&max_taken_date=".($timestamp+60*60*6);
$uri.="&extras=url_m&format=json&nojsoncallback=1";

//atención %20 es un espacio codificado
//para obtener las fechas como timestamp http://www.onlineconversion.com/unix_time.htm


$data=file_get_contents($uri);
$object = json_decode( $data ); // stdClass object

//aqui ya tengo los datos en un array de php
print_r($object);
?>


<?php
foreach($object->photos->photo as $p){
	$link="http://flickr.com/photo.gne?id=".$p->id;

	print "<a href='".$link."'><img src='".$p->url_m."'/></a>";
}
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
