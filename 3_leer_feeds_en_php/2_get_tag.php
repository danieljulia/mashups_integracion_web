<?php

/* ejemplo que simplemente recoge el tag de la url */

if(isset($_GET['tag'])){
	$tag=$_GET['tag'];
}else{
	print "no has especificado ningún tag en la url  ?tag=…..";
	exit();
}

?>
<html>
<head>
<meta charset="utf-8">
<style>img{ height: 100px; float: left; }</style>
</head>
<body>
  <h1><?php print $tag?></h1>
</body>
</html>
