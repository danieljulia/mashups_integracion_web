<?php 
$url="https://api.darksky.net/forecast/6da55ae4d3b635780617e4cf3bd9d2ca/41.39,2.16?units=si&lang=es";		

$res=file_get_contents($url);
$data=json_decode($res);

//print_r($data);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

Temperatura actual:
<?php echo round($data->currently->temperature)?> c.

</body>
</html>

