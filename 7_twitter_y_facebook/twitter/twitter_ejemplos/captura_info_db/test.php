<?php

require "config.php";
require "twitter.php";


$tw=new twitterDB(DB_HOST,DB_USER,DB_PWD,DB_NAME);

$data=$tw->twittGet();
print_r($data);

?>