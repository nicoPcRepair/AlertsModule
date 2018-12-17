<?php
function loadClass($class)
{
 	require $class . '.php';
}

spl_autoload_register('loadClass');

$array = array(
	'id'			=> 1,
	'lat'			=> 20.101,
	'lng' 		=> -69.123,
	'title' 	=> 'test',
	'text' 		=> 'test2',
	'dateMin' => time(),
	'dateMax' => time() + (7 * 24 * 60 * 60),
	'type' 		=> 1,
	'status' 	=> 1
);
$alert = new Alert($array);

$db = new PDO('mysql:host=localhost;dbname=aireade', 'root', '');
$alertsManager = new AlertsManager($db);

/*
echo '<pre>';
var_dump($alert);
echo '</pre>';
*/


$alertsManager->add($alert);

$getAlert = $alertsManager->get(1);

echo '<pre>';
var_dump($getAlert);
echo '</pre>';
