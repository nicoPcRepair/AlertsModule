<?php
function loadClass($class)
{
 	require $class . '.php';
}

spl_autoload_register('loadClass');

$array = array(
	'id'			=> 1,
	'lat'			=> 123.45,
	'lng' 		=> -4.56,
	'title' 	=> 'XYZ',
	'text' 		=> 'OOOOOOOO',
	'dateMin' => time(),
	'dateMax' => time() + (7 * 24 * 60 * 60),
	'type' 		=> 1,
	'status' 	=> 99
);
$alert = new Alert($array);

$db = new PDO('mysql:host=localhost;dbname=aireade', 'root', '');
$alertsManager = new AlertsManager($db);

/*
echo '<pre>';
var_dump($alert);
echo '</pre>';
*/


//$alertsManager->add($alert);

//$getAlert = $alertsManager->get(1);
$getAlert = $alertsManager->update($alert);


echo '<pre>';
var_dump($getAlert);
echo '</pre>';
