<?php
/////////////////////////////////////////////////////////////////////////
function loadClass($class) { require $class . '.php'; }
spl_autoload_register('loadClass');
/////////////////////////////////////////////////////////////////////////
$db = new PDO('mysql:host=localhost;dbname=aireade', 'root', '');
/////////////////////////////////////////////////////////////////////////

if(isset($_GET['page']))
{
	if(is_file('controllers/'.$_GET['page'].'.php'))
	{
		include("controllers/".$_GET['page'].'.php');
	}
	else
	{
		echo $_GET['page'].' controller not found!';
	}
}
else
{
	echo "<a href='index.php?page=home'>HOME</a>";
} 



?>