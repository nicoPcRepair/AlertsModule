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