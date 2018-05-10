<?php

/**
https://github.com/blasten/turn.js
*/


$tag="cat";

if(isset($_GET['tag'])){
	$tag=$_GET['tag'];
}else{

}

$uri="https://api.instagram.com/v1/tags/".$tag."/media/recent?client_id=128d96b790704f5db73b5a3dc706831a";


/*
$user="ganyet";
$requser="https://api.instagram.com/v1/users/search?q=".$user."&client_id=99e92b11c3884ed480f063ccac83ac51";
$res=doCurl($requser);
$user_data=json_decode($res);
$user_id=$user_data->data[0]->id;
$uri="https://api.instagram.com/v1/users/".$user_id."/media/recent?client_id=99e92b11c3884ed480f063ccac83ac51";
*/
//print_r($user_id);

//print $uri;
$res=file_get_contents($uri);
$data=json_decode($res);




?>

<!doctype html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/turn.js"></script>
<script>
$(document).ready(function(){
		creaRevista();
		eventoTeclado();
});
</script>
<style type="text/css">
body{
	background:#ccc;
}
#magazine{ /* basado en instagram 612x612 */
	width:1224px;
	height:612px;
}
#magazine .turn-page{
	background-color:#fff;
	background-size:100% 100%;
}
</style>
</head>
<body>

<div id="magazine">
	<?php
	foreach($data->data as $item):
	?>
	<div style="background-image:url(<?= $item->images->standard_resolution->url?>);"></div>
	<?php
	endforeach;
	?>


</div>


<script type="text/javascript">

	function creaRevista(){
		$('#magazine').turn({
			display: 'double',
			acceleration: true,
			gradients: !$.isTouch,
			elevation:50,
			when: {
				turned: function(e, page) {
					console.log('Current view: ', $(this).turn('view'));
				}
			}
		});
	}

	function eventoTeclado(){
		$(window).bind('keydown', function(e){

		if (e.keyCode==37)
			$('#magazine').turn('previous');
		else if (e.keyCode==39)
			$('#magazine').turn('next');

		});
	}

</script>

</body>
</html>
