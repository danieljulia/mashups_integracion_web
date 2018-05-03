<?php
$tag="barcelona";
$data=file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?tags=".$tag."&tagmode=any&format=php_serial");


$object = unserialize( $data ); // stdClass object

//print_r($object);
?>

<!doctype html>
<html>
<head>
  <style>img{ height: 100px; float: left; }</style>
</head>
<body>
  <div id="images">
  <?php
  foreach($object['items'] as $item):
  ?>
  <img src='<?= $item['photo_url']?>'/>
  <?php
  endforeach;
  ?>

  </div>
</body>
</html>


<?php
/*
alternativa si no funciona file_get_contents

$ch = curl_init(); // open curl session
// set curl options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch); // execute curl session
curl_close($ch); // close curl session

*/
?>
