<?php
//mostrar errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

//cambiar por la clave solicitada en flickr
$apikey="48cda05224d3a402fd8a7b764dfcbfdc";

$tag="larambla";

$fotos=flickr_get_fotos($tag,$apikey);

function flickr_get_fotos($tag,$apikey){


  $uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&per_page=20&api_key=".$apikey."&tags=".$tag;
  $uri.="&sort=interestingness-desc&extras=url_m,tags&format=json&nojsoncallback=1";

  //estan ordenadas por interes!!

  $data=file_get_contents($uri);
  $object = json_decode( $data ); // stdClass object
  //print_r($object);
  $indx=array_rand($object->photos->photo);
  return $object->photos->photo;

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
 
  <style>
  body{
	background-color:#000000;
  color:#ffffff;
  }
  ul{
  list-style:none;
  }
  
  img{
  border:16px;
  border-style:solid;
  border-color:#333333;
  width:900px;
  }

  #page{
	margin: 0 auto;
	width:900px;
  }
  
  #frase{
	  font-family: georgia,"times new roman",serif;
	  font-size: 2.8em;
	  color:#aaaaaa;
  }
  
  </style>
</head>
<body>
<div id="page">
  

  <div id="fotos">
    <?php 
    foreach($fotos as $f):
      ?>
    <div class="foto">
    <a href="http://flickr.com/photo.gne?id=<?php echo $f->id?>">
    <img src="<?php echo $f->url_m?>"></a>
    <p class="title"><?php echo $f->title?></p>
  </div>
  <?php
  endforeach;
  ?>
  </div>

  </div>
</body>
</html>
