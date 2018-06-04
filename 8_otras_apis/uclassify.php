<?php

/**
https://www.uclassify.com/browse/uclassify/sentiment

*/


$frase="This is awesome";
//this sucks

$options = array(
    'http' => array(
		'method'  => 'POST',
		'header'  => "Authorization: Token [PONERAQUILACLAVE]\r\nContent-Type: application/json\r\n",
        'content' => '{"texts": ["'.$frase.'"]}',
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents('https://api.uclassify.com/v1/uclassify/sentiment/classify', false, $context);
$res=json_decode($result);
print_r($res);


echo "<br>";echo "<br>";
echo "Analizando frase: ".$frase;
echo "<br>";
echo $res[0]->classification[0]->className;
echo ": ".$res[0]->classification[0]->p;
echo "<br>";

echo $res[0]->classification[1]->className;
echo ": ".$res[0]->classification[1]->p;
echo "<br>";
