<?php

function getAlertsbyLocation($db,$lat,$lng){

	$alertsManager = new AlertsManager($db);
	return $alertsManager->getAlertsbyLocation($lat,$lng);
}

?>