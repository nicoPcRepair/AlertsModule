<?php
/*
$array = array(
	//'id'			=> 1,
	'userId'	=> 1,
	'lat'			=> 8.888,
	'lng' 		=> -7.123,
	'title' 	=> 'uhuhfuhsfusdf',
	'text' 		=> 'jezijijfizejfizefjizjefijzefizefjiezf',
	'dateMin' => time(),
	'dateMax' => time() + (7 * 24 * 60 * 60),
	'type' 		=> 1,
	'status' 	=> 1
);
*/

function getAlertsbyUserId($db,$userId){

	$alertsManager = new AlertsManager($db);
	return $alertsManager->getList($userId);
}

?>