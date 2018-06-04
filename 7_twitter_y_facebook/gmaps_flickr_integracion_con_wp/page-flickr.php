<?php
/**
Template name: Fotos de flickr en un mapa
*/


wp_enqueue_script( 'google-maps', 'http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places', null, null ,false);
//wp_enqueue_script( 'agenda-mapa', get_stylesheet_directory_uri(). '/js/mapa.js', array( 'agenda-mapa-api','jquery','responsive-nav' ),null,true);

get_header();
?>


<script type="text/javascript">

google.maps.event.addDomListener(window, 'load', initialize);
var map; //fuera del contexto de las funciones para que sea siempre accesible
var veces=0;

  function initialize() {
    //iniciar el mapa en esta posición (se puede cambiar)
    var latlng = new google.maps.LatLng(41.39, 2.13);
    var myOptions = {
      zoom: 5,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP   //MapTypeId.SATELLITE, //cambiar por esto si queremos mostrar modo satelite
    };
     map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);



	//llamada a la api de flickr  cambiar estos 2 valores!!
	var apikey="803c9828d52e6a1bb961e9d8b337caa1"; //cambiar por la clave correcta
	var user_id="60814789@N00"; //id del usuario.. no es el nombre!! hay que buscarlo aqui http://idgettr.com/
	/*obtener el id de usuario aqui

	por ejemplo el mio es 60814789@N00

	http://idgettr.com/

	atención: esta llamada solo muestra las fotos geolocalizadas

	*/

	var uri="https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key="+apikey+"&per_page=500&user_id="+user_id+"&sort=interestingness-desc&has_geo=1&extras=date_taken,owner_name,views,geo,url_m&format=json&nojsoncallback=1";
	console.log(uri);

     jQuery.getJSON(uri,
        function(data){



		console.log(data);
		console.log("He encontrado fotos: ",data.photos.photo.length)
		jQuery.each(data.photos.photo, function(i,item) {
		  //para cada una de las fotos crear el fragmento de html
		   var html="<img width='200' src='"+item.url_m+"'>"+item.title;

		   //imagen en pequeño
		   var mini=item.url_m.replace(".jpg","_s.jpg");

			createMarker(map,new google.maps.LatLng(
				item.latitude,
				item.longitude),
				mini,
				html);



		});


	});



  }



  //crea un marker con una burbuja de texto, y una imagen personalizada
  function createMarker(map,point,image, txt) {


	  var marker = new google.maps.Marker({
		  position: point,
		  map: map,
		  icon: image
	  });



	var infowindow = new google.maps.InfoWindow({
		content: txt
	});
	google.maps.event.addListener(marker, 'click', function() {

	  infowindow.open(map,marker);

	});


	return marker;
   }





</script>


<h1>El mapa</h1>
  <div id="map_canvas" style="width:100%; height:800px"></div>

<?php get_footer()?>
