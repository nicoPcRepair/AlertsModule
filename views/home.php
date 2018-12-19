<?php
/*
echo '<pre>';
var_dump($list);
echo '</pre>';
*/
if(!empty($listAlerts))
{

	foreach ($listAlerts as $alert) {
		echo "<div style='border: 1px solid black;'>";
		echo $alert->title();
		echo "<hr />";
		echo $alert->text();
		echo $alert->dateMin();
		echo "</div>";
	}
}
?>