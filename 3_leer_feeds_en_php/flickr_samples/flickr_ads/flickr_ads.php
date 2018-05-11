<?php
//mostrar errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

//cambiar por la clave solicitada en flickr
$apikey="48cda05224d3a402fd8a7b764dfcbfdc";

 
 $frases=Array(
  'amor'=>"Te amo más que ayer y menos que mañana",
  'doit'=>"Just do it",
  'diamond'=>"A diamond is forever",
  'mind'=>"A mind is a terrible thing to waste",
  'coke'=>" Always Coca-Cola",
  'apple'=>"An apple a day keeps the doctor away.",
  'youcan'=>"Be all that you can be.",
  'obsession'=>"Between love and madness lies Obsession.",
  'breakfast'=>"Breakfast of Champions",
  'connecting'=>"Connecting People",
  'mcdonalds'=>"Did somebody say McDonald's?",
  'yahoo'=>"Do you...Yahoo!?",
  'chikin'=>"Eat Mor Chikin!",
  'kiss'=>"Every kiss begins with Kay",
  'kitkat'=>"Give me a break",
  );
  
  $tag=array_rand($frases);
  $mifrase=$frases[$tag];

  $foto=flickr_get_foto($tag,$apikey);
  //print_r($foto);
function flickr_get_foto($tag,$apikey){


  $uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&per_page=20&api_key=".$apikey."&tags=".$tag;
  $uri.="&sort=interestingness-desc&extras=url_m,tags&format=json&nojsoncallback=1";



  $data=file_get_contents($uri);
  $object = json_decode( $data ); // stdClass object
  //print_r($object);
  $indx=array_rand($object->photos->photo);
  $foto=$object->photos->photo[$indx];
  return $foto;

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
  
  <div id="frase">
 <?php print $mifrase ?>
 [<?php print $tag ?>]
  </div>

  <div id="foto">
    <a href="http://flickr.com/photo.gne?id=<?php echo $foto->id?>">
    <img src="<?php echo $foto->url_m?>">
  </a>
  </div>

  </div>
</body>
</html>
