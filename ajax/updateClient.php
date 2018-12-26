<?php
require '../config/db.php';

$lat = $_GET['lat'];
$lng = $_GET['lng'];

function loadClass($class) { require '../' . $class . '.php'; }
spl_autoload_register('loadClass');

//////////////////////////////////////////////////////////////////////////////////////////////////////

$alertsManager = new AlertsManager($db);
$usersManager = new usersManager($db);
$listAlerts = $alertsManager->getAlertsbyLocation($lat,$lng);


if(!empty($listAlerts))
{
	echo'<div id="accordion" style="margin-top : 10px">';

	foreach ($listAlerts as $alert) {
		$userInfos = $usersManager->get($alert->userId());
		echo'
				<div class="card">
					<div class="card-header" id="heading'.$alert->id().'">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$alert->id().'" aria-expanded="true" aria-controls="collapse'.$alert->id().'">
							 <span class="badge badge-primary" style="font-size: 14px;">'.$userInfos->name().' </span> '.$alert->title().'
							</button>
						</h5>
					</div>

					<div id="collapse'.$alert->id().'" class="collapse" aria-labelledby="heading'.$alert->id().'" data-parent="#accordion">
						<div class="card-body">
							'.$alert->text().'
							<br />
							<div style="font-size:10px; border-top:1px solid #ddd">
								'.$userInfos->address().'
							</div>
						</div>
					</div>
				</div>
		';
	}

	echo'</div>';



}
?>