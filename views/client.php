<script>
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};
 

function success(pos) {
  var crd = pos.coords;

  var response = '';
  response += 'Votre position actuelle est :';
  response += ' Latitude : ';
  response += crd.latitude;
  response += ' Longitude : ';
  response += crd.longitude;

  $('#geolocationResponse').html('<div class="alert alert-success" role="alert">'+response+'</div>');

  //console.log('watchPosition \r\n');

  updateClient(crd.latitude,crd.longitude);
}

function error(err) {

	if(err.code != 3) {
		var response = '';
	  response += 'Erreur :';
	  response += err.message;
	  response += ' (';
	  response += err.code;
	  response += ')';  

	  $('#geolocationResponse').html('<div class="alert alert-danger" role="alert">'+response+'</div>');  		
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

<div id='geolocationResponse'></div>	
<div id='clientResponse'></div>	

<?php
if(!empty($listAlerts))
{
	foreach ($listAlerts as $alert) {
		echo "<div style='border: 1px solid black;'>";
		echo '['.$alert->lat().','.$alert->lng().'] by user #'.$alert->userId();
		echo "<hr />";
		echo '<u>'.$alert->title().'</u> <br />';
		echo $alert->text();
		echo "<hr />";
		echo date('d/m/Y', $alert->dateMin());
		echo ' > '.date('d/m/Y', $alert->dateMax());
		echo "</div>";
	}
}
?>