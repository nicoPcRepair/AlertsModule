<script>
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};
 

function success(pos) {
  var crd = pos.coords;
	
	var response = '<i class="fas fa-satellite-dish"></i>';
	response += ' Connecté.e';
  /*
  response += 'Votre position actuelle est :';
  response += ' Latitude : ';
  response += crd.latitude;
  response += ' Longitude : ';
  response += crd.longitude;
  */

  $('#geolocationResponse').html('<span class="badge badge-success">'+response+'</span>');

  //console.log('watchPosition \r\n');

  updateClient(crd.latitude,crd.longitude);
}

function error(err) {

	if(err.code != 3) {
		var response = '';
	  response += 'Erreur : ';
	  response += err.message;
	  response += ' (';
	  response += err.code;
	  response += ')';  

	  $('#geolocationResponse').html('<span class="badge badge-danger">'+response+'</span>');  		
	
	} else {

		navigator.geolocation.getCurrentPosition(success, error, options);

	}

}

function updateClient(lat,lng) {
	$.ajax({
		url : 'ajax/updateClient.php',
		type : 'GET',
		data : {lat: lat, lng: lng},
		//dataType : 'html',
		success : function(html, status){
			$('#clientResponse').html(html);
		},

		error : function(result, status, error){
			alert('Error');
		},

		complete : function(result, status){

		}

	});	
}

navigator.geolocation.getCurrentPosition(success, error, options);
//navigator.geolocation.watchPosition(success, error, options);
</script>
	
<div id='clientResponse'></div>	
