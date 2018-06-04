<?php
//tercer paso: leer los datos y hacer algo con ellos

require "config.php";
require "twitter.php";



//esto es nuevo atención: poner los datos de la conexión!
$tw=new twitterDB(DB_HOST,DB_USER,DB_PWD,DB_NAME);

$data=$tw->twittGet(); //podemos pasar el numero de twitts que queramos
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Extrayendo info de twitts</title>
</head>
<body>
<ul>
<?php
foreach($data as $twitt){
?>
<li><img src="<?php print $twitt['profile_image_url']?>"><?php print $twitt['text']?></li>
<?php
}
?>
</ul>
</body>
</html>